<header>
    <img class="logo" src="images/ourLogo.png" alt="logo">
    <div class="search-box">
        <form class="search-box"  action="search.php" method="POST">
            <button type="submit">
                <img src="images/search.png">
            </button>
            <input class="search-box" type="text" name="search_input" placeholder="Search">
        </form>
    </div>
    <nav>
    </nav>
    <a class="navBtn" href="#"><button class="navBtn">Sign In</button></a>
    <a class="navBtn" href="#"><button class="navBtn">Sign Up</button></a>
</header>
<div class="container">
    <div class="left-bar">
        <div class="left-link">
            <div class="new-threadBtn">
                <form action="new_thread2.php" method="POST" enctype="text/plain">
                <a class="left-bar-Btn" href="new_thread.html"><button class="left-bar-Btn">New Thread</button></a>
                </form>
            </div>
            <a href="threads_main2.php">Home</a>
            <a href="#MostPopular">Most popular</a>
        </div>
        <div class="left-topic">
            <p>Topics</p>
            <a href="#topic1"><u>All kittens are cute because</u></a>
            <a href="#topic2"><u>I wish kittens were fuzzier.</u></a>
            <a href="#topic3"><u>Need advice on how to dye my kitten</u></a>
            <a href="#topic4"><u>Why cats make the best pets</u></a>
        </div>
    </div>