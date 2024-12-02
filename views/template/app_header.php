<head>
<script src="https://cdn.tailwindcss.com"></script>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>My Site</title>
</head>
<body class="bg-[#e9f5e3]"> 
    <header class="flex justify-between p-4 items-baseline bg-[#2c4324]">
        <h1 class="text-[#c5e1b5] text-3xl font-bold">WattWise</h1>
        <nav class="flex gap-4 items-center">
            <a href="/database_class/views/home.php" class=" hover:border-b-2 border-[#c5e1b5] text-[#c5e1b5] text-lg">Home</a>
            <a href="/database_class/views/add_meter.php" class=" hover:border-b-2 border-[#c5e1b5] text-[#c5e1b5] text-lg">Add meter</a>
            <?php
                if(session_status()==PHP_SESSION_NONE){
                    session_start();
                }
                $user_id = $_SESSION["user_id"];
            echo '<a href="/database_class/views/profile.php?user_id='.$user_id.'" class=" hover:border-b-2 border-[#c5e1b5] text-[#c5e1b5] text-lg">View profile</a>';
                    
            ?>
            <a href="/database_class/views/logout.php" class=" hover:border-b-2 border-[#c5e1b5] text-[#c5e1b5] text-lg">Leave</a>
        </nav>
</header>