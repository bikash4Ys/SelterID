<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asahi Ward Evacuation Shelter List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 50%, #ffecd2 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        nav {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }
        .container {
            width: 95%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .center {
            text-align: center;
        }
        .top {
            vertical-align: top;
        }
        .fade-in {
            /* opacity: 0; */
            opacity: 1;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="p-4 shadow-md fixed w-full top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            <a href="../index.php"><h1 class="text-xl font-bold text-purple-600">SHELTER ID</h1></a>
            <ul class="flex space-x-4">
                <li><a href="../index.php" class="text-purple-500 hover:text-purple-700">Home</a></li>
                <li><a href="dashboard.php" class="text-purple-500 hover:text-purple-700">Dashboard</a></li>
                <li><a href="login.php" class="text-purple-500 hover:text-purple-700">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Shelter List -->
    <div class="container mt-16">
        <h1 class="text-2xl font-bold text-center mb-6">Asahi Ward Evacuation Shelter List</h1>
        <table class="table-auto w-full border">
            <caption class="sr-only">List of Asahi Ward evacuation shelters</caption>
            <thead>
                <tr>
                    <th class="center top" scope="col">No.</th>
                    <th class="center top" scope="col">Name of Base</th>
                    <th class="center top" scope="col">Target Area</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="center top">1</td>
                    <td class="top">Tsurugamine Elementary School</td>
                    <td class="top">Kawajima-machi 1574-1925<br>Tsurugamine 1-chome 1-63, 69-89, 95, 96<br>2, Tsurugamine<br>Nishikawashimacho</td>
                </tr>
                <tr>
                    <td class="center top">2</td>
                    <td class="top">Fudomaru Elementary School</td>
                    <td class="top">1-chome Shirane<br>Shirane 2-chome<br>Shirane Sanchome<br>6-chome 1-72 Shirane<br>Shirane 7-chome No. 1-20, No. 30-33</td>
                </tr>
                <tr>
                    <td class="center top">3</td>
                    <td class="top">Shirane Elementary School</td>
                    <td class="top">1, Nakashirane<br>Nakashirane 2-chome No. 1-30, 34-36, 48<br>Shirane 7-chome 20 to 29, 33 to 37<br>8-chome Shirane<br>1, Kamishirane<br>112, Kamishiranecho</td>
                </tr>
                <tr>
                    <td class="center top">4</td>
                    <td class="top">Kamishirane Elementary School</td>
                    <td class="top">Nakashirane 2-chome 31-33, 37, 39, 40, 46, 47<br>3, Nakashirane<br>4, Nakashirane<br>Shiranecho<br>Kamishirane 2-chome 34-37, 39<br>Kamishirane 3-chome 1 to 30, 34 to 41</td>
                </tr>
                <tr>
                    <td class="center top">5</td>
                    <td class="top">Shiki no Mori Elementary School</td>
                    <td class="top">Kamishirane-cho 717-794, 795<br>796～982, 1139～1447</td>
                </tr>
                <tr>
                    <td class="center top">6</td>
                    <td class="top">Imajuku Elementary School</td>
                    <td class="top">Imajuku Higashimachi 511-806, 808, 809, 811-831, 833-1637<br>1639-1666</td>
                </tr>
                <tr>
                    <td class="center top">7</td>
                    <td class="top">Imajuku Minami Elementary School</td>
                    <td class="top">Imajuku Higashimachi 1530-2, 1543-1, 1638<br>Imajukuminamicho 1-2229, 2231-2240, 2242-2288, 2290-2343<br>Imagawa-cho 35-47, 50-52, 55-123</td>
                </tr>
                <tr>
                    <td class="center top">8</td>
                    <td class="top">Miyakooka Elementary School</td>
                    <td class="top">Imajukunishicho<br>Tsuokacho<br>Shimokawai-cho<br>Yasashi-cho 1197-1203, 1271-1281, 1283-1835, 1850-2023<br>Kanegaya 417-485, 487, 488</td>
                </tr>
                <tr>
                    <td class="center top">9</td>
                    <td class="top">Kawai Elementary School</td>
                    <td class="top">Kawaishukucho<br>Kawai Honmachi<br>Kamikawai-cho 3220, 3226, 3228, 3230, 3231, 3233</td>
                </tr>
                <tr>
                    <td class="center top">10</td>
                    <td class="top">Kamikawai Elementary School</td>
                    <td class="top">Kawaihonmachi 58-3, 58-4, 59-4, 59-5, 59-8, 59-9<br>Kamikawai-cho 1-3219, 3221-3225, 3227, 3229, 3232, 3234, 3235</td>
                </tr>
                <tr>
                    <td class="center top">11</td>
                    <td class="top">Wakabadai Special Needs School (Yokohama Wakaba Gakuen)</td>
                    <td class="top">1, Wakabadai<br>Wakabadai 2-chome No. 1-6, No. 20-29</td>
                </tr>
                <tr>
                    <td class="center top">12</td>
                    <td class="top">Wakabadai Elementary School</td>
                    <td class="top">Wakabadai 2-chome 7-19<br>Wakabadai 3-chome 2-8<br>4-chome 14-24 Wakabadai</td>
                </tr>
                <tr>
                    <td class="center top">13</td>
                    <td class="top">Former Wakabadainishi Junior High School</td>
                    <td class="top">Wakabadai 3-chome 1, 9 to 15<br>Wakabadai 4-chome 1 to 13, 25 to 36</td>
                </tr>
                <tr>
                    <td class="center top">14</td>
                    <td class="top">Sasanodai Elementary School</td>
                    <td class="top">Yasashi-cho 1194-1197, 1204-1270, 1282, 1836-1849<br>1, Kanegaya<br>Kanagaya 2-chome 1, 6-18<br>Kanegaya 611-735<br>1, Sasanodai<br>2, Sasanodai<br>3, Sasanodai<br>4, Sasanodai</td>
                </tr>
                <tr>
                    <td class="center top">15</td>
                    <td class="top">Hikarigaoka Elementary School</td>
                    <td class="top">Kamishirane-cho 717-794, 795<br>796-982, 1139-1447</td>
                </tr>
                <tr>
                    <td class="center top">16</td>
                    <td class="top">Minami Shinjuku Elementary School</td>
                    <td class="top">Shinjuku 1-chome<br>Shinjuku 2-chome 1-70<br>3-chome 15-20</td>
                </tr>
                <tr>
                    <td class="center top">17</td>
                    <td class="top">Tsunashima Elementary School</td>
                    <td class="top">Tsunashima Higashi 1-50<br>Naka-cho<br>Tsutsujigaoka</td>
                </tr>
                <tr>
                    <td class="center top">18</td>
                    <td class="top">Takashima Elementary School</td>
                    <td class="top">Takashima-cho 1-80<br>Kannai 1-chome<br>2-chome 1-45</td>
                </tr>
                <tr>
                    <td class="center top">19</td>
                    <td class="top">Midorigaoka Junior High School</td>
                    <td class="top">Midorigaoka 1-67<br>Kagami-machi 2-30<br>3-50, 100-150</td>
                </tr>
                <tr>
                    <td class="center top">20</td>
                    <td class="top">Hoshikawa Elementary School</td>
                    <td class="top">Hoshikawa-cho<br>Sakuragaoka<br>Asahi-ku 1-10</td>
                </tr>
            </tbody>
        </table>
    </div>

  
    <footer class="bg-grey-800 text-purple-700 py-6 fade-in">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Yokohama System Engineering College. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
