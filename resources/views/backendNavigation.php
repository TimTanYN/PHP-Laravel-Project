<html>
    <head>
        <title>Navigation</title>
    </head>
    <style>
        @charset "UTF-8";
        .navigation {
            height: 70px;
            background: #262626;
        }

        .brand {
            position: absolute;
            padding-left: 20px;
            float: left;
            line-height: 70px;
            text-transform: uppercase;
            font-size: 1.4em;
        }
        .brand a,
        .brand a:visited {
            color: #ffffff;
            text-decoration: none;
        }

        .nav-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        nav {
            float: right;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            float: left;
            position: relative;
        }
        nav ul li a,
        nav ul li a:visited {
            display: block;
            padding: 0 20px;
            line-height: 70px;
            background: #262626;
            color: #ffffff;
            text-decoration: none;
        }
        nav ul li a:hover,
        nav ul li a:visited:hover {
            background: #2581DC;
            color: #ffffff;
        }
        nav ul li a:not(:only-child):after,
        nav ul li a:visited:not(:only-child):after {
            padding-left: 4px;
            content: " ▾";
        }
        nav ul li ul li {
            min-width: 190px;
        }
        nav ul li ul li a {
            padding: 15px;
            line-height: 20px;
        }

        .nav-dropdown {
            position: absolute;
            display: none;
            z-index: 1;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
        }

        /* Mobile navigation */
        .nav-mobile {
            display: none;
            position: absolute;
            top: 0;
            right: 0;
            background: #262626;
            height: 70px;
            width: 70px;
        }

        @media only screen and (max-width: 798px) {
            .nav-mobile {
                display: block;
            }

            nav {
                width: 100%;
                padding: 70px 0 15px;
            }
            nav ul {
                display: none;
            }
            nav ul li {
                float: none;
            }
            nav ul li a {
                padding: 15px;
                line-height: 20px;
            }
            nav ul li ul li a {
                padding-left: 30px;
            }

            .nav-dropdown {
                position: static;
            }
        }
        @media screen and (min-width: 799px) {
            .nav-list {
                display: block !important;
            }
        }
        #nav-toggle {
            position: absolute;
            left: 18px;
            top: 22px;
            cursor: pointer;
            padding: 10px 35px 16px 0px;
        }
        #nav-toggle span,
        #nav-toggle span:before,
        #nav-toggle span:after {
            cursor: pointer;
            border-radius: 1px;
            height: 5px;
            width: 35px;
            background: #ffffff;
            position: absolute;
            display: block;
            content: "";
            transition: all 300ms ease-in-out;
        }
        #nav-toggle span:before {
            top: -10px;
        }
        #nav-toggle span:after {
            bottom: -10px;
        }
        #nav-toggle.active span {
            background-color: transparent;
        }
        #nav-toggle.active span:before, #nav-toggle.active span:after {
            top: 0;
        }
        #nav-toggle.active span:before {
            transform: rotate(45deg);
        }
        #nav-toggle.active span:after {
            transform: rotate(-45deg);
        }

        article {
            max-width: 1000px;
            margin: 0 auto;
            padding: 10px;
        }
    </style>
    <body>

        <section class="navigation">
            <div class="nav-container">
                <div class="brand">
                    <a href="#!"><img src="https://th.bing.com/th/id/OIG.b9RNNjHb5lTILMDzrQMb?pid=ImgGn" height="70px"/></a>
                </div>
                <nav>
                    <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
                    <ul class="nav-list">
                        <li>
                            <a href="/movieBack">Movie</a>
                        </li>
                        <li>
                            <a href="/staff">Staff</a>
                        </li>
                        <li>
                            <a href="/order">Order/Customer</a>

                        </li>
                        <li>
                            <a href="/reward">Reward</a>
                        </li>

                        <li>
                            <a href="/food">Food</a>
                        </li>
                        
                        <li>
                            <a href="/hall">Hall</a>
                        </li>
                         <li>
                            <a href="/seat">Seat</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>

        <article>
            <h2>Navigation</h2>
            <p>Hi,This is our Integrative Programming Project.</p>
            <p>Team Member</p>
            <ul>
                <li><p>Tan Yi Nuo</p></li>
                <li> <p>Tan Hao Yi</p></li>
                <li><p>Tan Yee Yao</p></li>
                <li> <p>Ho Zhi Hong</p></li>
            </ul>
            
           
           
        </article>

    </body>
</html>