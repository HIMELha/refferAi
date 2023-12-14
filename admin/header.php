        <header class="flex justify-between items-center p-2 pl-4 pr-4 bg-blue-400">
            <div class="logo">
                <a href="index.php" class="text-md text-white p-2"><i class="fa-solid fa-chart-simple mr-2 text-gray-200"></i>Reffer<span class="text-green-400 font-bold">AI</span></a>
            </div>
            <div class="flex gap-2 p-1 items-center md-flex-row transition">
            <?PHP echo '<p class="text-white">hello, '. $_SESSION['admin']; ?>
            <a href="logout.php" class="ml-4 text-md underline hover:text-blue-500">Logout</a></p>
            </div>
        </header>