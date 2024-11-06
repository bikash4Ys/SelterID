
const rectipt = () => {
    var userId = getUserId();
    document.getElementById('user-id').value = userId;
    document.getElementById('receipt-form').submit();
}

// TODO: ビカスさんのプログラムでカメラから users.id をもらう
const getUserId = () => {
    const userId = Math.floor(Math.random() * 20) + 1;
    return userId;
}
