<head>
<script src="https://cdn.tailwindcss.com"></script>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<title>My Site</title>
</head>
<body class="bg-[#e9f5e3] font-['Poppins',sans-serif]"> 
    <header class="flex justify-between p-4 items-baseline bg-[#2c4324]">
        <h1 class="text-[#c5e1b5] font-serif text-3xl font-bold">WattWise</h1> 
        <!-- <img src="https://www.flaticon.com/free-icon/lighting_2731636?page=1&position=3&term=electricity&origin=style-search&related_id=2731636"> -->
        <nav class="flex gap-4 items-center">
            <a href="/prepaid-electricity-system/views/home.php" class=" hover:border-b-2 border-[#c5e1b5] text-[#c5e1b5] text-lg">Home</a>
            <a href="/prepaid-electricity-system/views/add_meter.php" class=" hover:border-b-2 border-[#c5e1b5] text-[#c5e1b5] text-lg">Add meter</a>
            <?php
                if(session_status()==PHP_SESSION_NONE){
                    session_start();
                }
                $user_id = $_SESSION["user_id"];
                if(!isset($_SESSION["user_id"])){
echo "<script type='text/javascript'>alert('You have to login');</script>";
                    header("Location: http://localhost/prepaid-electricity-system/views/login.php");
                    
                }
            echo '<a href="/prepaid-electricity-system/views/profile.php?user_id='.$user_id.'" class=" hover:border-b-2 border-[#c5e1b5] text-[#c5e1b5] text-lg">View profile</a>';
                    
            ?>
            <a href="/prepaid-electricity-system/views/logout.php" class=" hover:border-b-2 border-[#c5e1b5] text-[#c5e1b5] text-lg">Leave</a>
        </nav>
</header>