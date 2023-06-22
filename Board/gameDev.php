<!DOCTYPE html>
<html>
<head>
    <title>GameDev_Board</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="../css/header.css">
    <style>
        footer.footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: lightgray;
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: bold;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .board {
            width: 300px;
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .board img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }

        .board-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .board-table {
            width: 100%;
            border-collapse: collapse;
        }

        .board-table th,
        .board-table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .board-table th {
            background-color: #f1f1f1;
            font-weight: bold;
            text-align: center;
        }

        .board-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .board-table a {
            text-decoration: none;
            color: inherit;
        }

        .board-table a:hover {
            text-decoration: underline;
        }

        .write-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .write-btn:hover {
            background-color: #45a049;
        }

        .login-msg {
            text-align: center;
            margin-top: 20px;
        }

        .login-msg a {
            color: #4CAF50;
            text-decoration: none;
        }

        .login-msg a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
session_start();
$connect = mysqli_connect("localhost", "root", "1234", "codetree");

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
    
}
?>

<nav>
    <h1><a href="../index.php">CodeTree</a></h1>
    <?php
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];

        echo "<img src=\"../img/user.png\" class=\"user-pic\" onclick=\"toggleMenu()\">";
        echo "<div class=\"sub-menu-wrap\" id=\"subMenu\">";
        echo "<div class=\"sub-menu\">";
        echo "<div class=\"user-info\">";
        echo "<img src=\"../img/user.png\" alt=\"\">";
        echo "<h2>$userid</h2>";
        
        echo "</div>";
        echo "<hr>";
        echo "<a href=\"#\" class=\"sub-menu-link\">";
        echo "<img src=\"../img/pro.png\" alt=\"\">";
        echo "<p>Edit Profile</p>";
        echo "<span></span>";
        echo "</a>";
        echo "<a href=\"?logout\" class=\"sub-menu-link\">";
        echo "<img src=\"../img/logout.png\" alt=\"\">";
        echo "<p>Logout</p>";
        echo "<span>></span>";
        echo "</a>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<a href=\"./login.php\" class=\"login-btn\">로그인</a>";
    }
    ?>
    <script>
        let subMenu = document.getElementById("subMenu");
        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</nav>
<?php
$query = "SELECT * FROM board ORDER BY number DESC";
if ($connect) {
    $result = mysqli_query($connect, $query);
    if (isset($_SESSION['userid'])) {
        ?>
        <h1 style="font-size: 25px; text-align: center;"><b>게임 개발 게시판</b></h1>
        <table class="board-table">
            <thead>
            <tr>
                <th width="50">번호</th>
                <th width="500">제목</th>
                <th width="100">작성자</th>
                <th width="200">날짜</th>
                <th width="50">조회수</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total = mysqli_num_rows($result);
            while ($rows = mysqli_fetch_assoc($result)) {
                $class = $total % 2 == 0 ? "even" : "";
                ?>
                <tr class="<?php echo $class; ?>">
                    <td width="50" align="center"><?php echo $total; ?></td>
                    <td width="500" align="center">
                        <a href="./read.php?number=<?php echo $rows['number']; ?>">
                            <?php echo $rows['title']; ?>
                        </a>
                    </td>
                    <td width="100" align="center"><?php echo $rows['id']; ?></td>
                    <td width="200" align="center"><?php echo $rows['date']; ?></td>
                    <td width="50" align="center"><?php echo $rows['hit']; ?></td>
                </tr>
                <?php
                $total--;
            }
            ?>
            </tbody>
        </table>

        <div class="text" style="text-align: center; margin-top: 20px;">
            <a href="./write.php?iswrite=1" class="write-btn">글쓰기</a>
        </div>
        <?php
    } else {
        ?>
        <h1 style="font-size: 25px; text-align: center;"><b>게임 개발 게시판</b></h1>
        <p style="text-align: center;">로그인이 필요한 서비스입니다. <a href="./login.php">로그인</a
        </p>
    <?php
    }
}
?>

<footer class="footer">
    CodeTree - 게임 개발 게시판
</footer>

</body>
</html>