const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const responseMessage = document.getElementById('responseMessage');

// キャプチャされた画像を保持するための DataTransfer オブジェクト
var dataTransfer = new DataTransfer();

// ローディングの表示
const showLoading = () => {
    document.getElementById('loading').classList.remove('hidden');
};

// ローディングの非表示
const hideLoading = () => {
    document.getElementById('loading').classList.add('hidden');
};

const wait = (ms) => new Promise((resolve) => setTimeout(resolve, ms));

const testLoading = async () => {
    console.log("Test started: Showing loading spinner...");
    // ローディングを表示
    showLoading();

    // 3秒間待機（ローディングが見える状態）
    await wait(500);

    // ローディングを非表示
    hideLoading();

    console.log("Test finished: Loading spinner hidden.");
};

// 受付処理
const recept = async (file) => {
    const formData = new FormData();
    formData.append('image', file);

    try {
        showLoading(); // ローディング表示

        const response = await fetch(API_RECEPT_FACE_URL, {
            method: 'POST',
            body: formData,
        });

        const contentType = response.headers.get('Content-Type');
        if (response.ok && contentType && contentType.includes('application/json')) {
            const result = await response.json();
            console.log(result)
            if (result.user_id > 0) {
                responseMessage.textContent = "Recept Success!!";
                addRecept(result.user_id)
            } else {
                responseMessage.textContent = "Recept Error!";
            }
        } else if (contentType && contentType.includes('text/html')) {
            const html = await response.text();
            responseMessage.textContent = `Error: Server returned HTML: ${html}`;
        } else {
            throw new Error('Unexpected response format');
        }
    } catch (error) {
        responseMessage.textContent = `Error: ${error.message}`;
        responseMessage.style.color = 'red';
    } finally {
        hideLoading();
    }
};

// 受付処理（複数）
const recepts = async (file) => {
    clearReceptionList();
    responseMessage.textContent = '';

    const formData = new FormData();
    formData.append('image', file);

    try {
        // 1. 顔認識APIにリクエスト
        const response = await fetch(API_RECEPT_FACES_URL, {
            method: 'POST',
            body: formData,
        });

        const contentType = response.headers.get('Content-Type');
        if (response.ok && contentType && contentType.includes('application/json')) {
            const result = await response.json();
            const userIds = result.user_ids;
            console.log(userIds)

            if (!userIds || userIds.length == 0) {
                responseMessage.textContent = '顔認証失敗'
                return;
            }
            // 2. User IDs を API_RECEPTS_URL に送信
            const receptsResponse = await fetch(API_RECEPTS_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ user_ids: userIds }),
            });

            if (receptsResponse.ok) {
                const receptsResult = await receptsResponse.json();
                console.log(receptsResult)
                if (receptsResult.data) {
                    renderReceptionList(receptsResult.data);
                }
                responseMessage.textContent = '受付が完了しました'
            } else {
                responseMessage.textContent = '受付エラー'
            }
        } else if (contentType && contentType.includes('text/html')) {
            const html = await response.text();
            responseMessage.textContent = `Error: Server returned HTML: ${html}`;
        } else {
            responseMessage.textContent = 'Unexpected response format'
        }
    } catch (error) {
        console.error('Error:', error);
        responseMessage.textContent = `Error: ${error.message}`;
        responseMessage.style.color = 'red';
    }
};


// カメラ起動処理
const onCamera = async () => {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;

        // ビデオサイズに基づいてキャンバスサイズを設定
        video.onloadedmetadata = () => {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
        };
    } catch (error) {
        console.error("Error accessing the camera:", error);
        alert("Unable to access the camera. Please check your device permissions.");
    }
};

const onDetect = () => {
    captureImage(detect)
}

const onRecept = () => {
    captureImage(recept)
}

const onRecepts = () => {
    captureImage(recepts)
}

// 画像キャプチャと送信処理
const captureImage = (callback) => {
    const context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    canvas.toBlob((blob) => {
        const file = new File([blob], `captured-image.jpg`, { type: 'image/jpeg' });
        // dataTransfer = new DataTransfer();
        // dataTransfer.items.add(file);
        callback(file);
    });
};

const addRecept = (userId) => {
    document.getElementById('user-id').value = userId;
    document.getElementById('receipt-form').submit();
}

function clearReceptionList() {
    const tableBody = document.getElementById("receptionTableBody");
    tableBody.innerHTML = "";
}

function renderReceptionList(data) {
    clearReceptionList();
    const tableBody = document.getElementById("receptionTableBody");
    data.forEach((item) => {
        const row = document.createElement("tr");

        // Reception Time
        const timeCell = document.createElement("td");
        timeCell.textContent = item.recepted_at;
        timeCell.className = "border border-gray-300 px-4 py-2";
        row.appendChild(timeCell);

        // Name
        const nameCell = document.createElement("td");
        nameCell.textContent = item.user.name;
        nameCell.className = "border border-gray-300 px-4 py-2";
        row.appendChild(nameCell);

        // Address
        // const addressCell = document.createElement("td");
        // addressCell.textContent = item.user.address || "N/A";
        // addressCell.className = "border border-gray-300 px-4 py-2";
        // row.appendChild(addressCell);

        tableBody.appendChild(row);
    });
}

// ページロード時にカメラを起動
window.onload = () => {
    onCamera();
    hideLoading();
};

showLoading();