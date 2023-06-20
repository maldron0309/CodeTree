<!DOCTYPE html> <html> <head> <title>GameDev_Board</title> <meta charset='utf-8'> <link rel="stylesheet" href="../css/header.css"> <style> body { margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f7f7f7; }
    header {
        background-color: #34495e;
        padding: 15px;
        text-align: center;
        font-size: 24px;
        color: white;
    }

    footer {
        background-color: #34495e;
        padding: 10px;
        font-weight: bold;
        text-align: center;
        color: white;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
    }

    .container {
        max-width: 960px;
        margin: 40px auto;
        padding: 16px;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    table, th, td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    table th {
        background-color: #f7f7f7;
        font-weight: bold;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .write-btn {
        background-color: #3498db;
        border: none;
        color: white;
        padding: 12px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 10px 2px;
        cursor: pointer;
        border-radius: 5px;
    }

    .write-btn:hover {
        background-color: #2980b9;
    }

</style>
</head> <body> <header> GameDev_Board </header> <div class="container"> <h1>게임 개발 게시판</h1> <table> <thead> <tr> <th width="50">번호</th> <th width="500">제목</th> <th width="100">작성자</th> <th width="200">날짜</th> <th width="50">조회수</th> </tr> </thead> <tbody> <!-- 게시글 리스트 --> </tbody> </table> <div> <a href="./write.php" class="write-btn">글쓰기</a> </div> </div> <footer> CodeTree - 게임 개발 게시판 </footer> </body> </html> 