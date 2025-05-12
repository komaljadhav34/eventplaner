<!DOCTYPE html>
<html>
<head>
<meta charset UTF-8>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="author" content="komal jadhav">
<title>Event planner</title>
<style>
margin:0px;
body {
font-family:roboto,sans-serif,arial;
font-size:20px;
color:#242424;
}
ul {
  list-style-type:none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color:black;
  font-size:20px;
}

li {
  text-align: right;
  float:right;
  
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 30px;
  text-decoration: none;
}

li a:hover {
  background-color: transparent;
}
a:link {
  color: white;
  background-color: transparent;
  text-decoration: none;
}
a:visited {
  color:white;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: red;
  background-color: transparent;
  text-decoration: none;
}
a:active {
  color: red;
  background-color: transparent;
  text-decoration: none;
}

body {
margin:25px;
}
.hero img {
            width: 100%;
            height: auto;
        }
        .hero .text {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }
        .hero .text h1 {
            font-size: 80px;
            margin: 0;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .hero .text p {
            font-size: 40px;
            margin: 0;
            font-style: italic;
        }
       .hero .text a {
            font-size: 50px;
            top: 90%;
            left: 70%;
            background-color: yellow;
            color:black
            
            
        }

}
 .register-button {
            background-color: red; /* Button color */
            color: black;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 20px;
            
                   }

      </style>
</head>
<body>


<ul>
<li><a href="Register.php" class="register-button">Add Event</a></li>
<li><a href="ContactUs.html">Contact Us</a></li>
<li><a href="Services.html">Services</a></li>
<li><a href="event.html">Our Events</a></li>
<li><a href="about.html">About Us</a></li>
<li><a href="home.php">Home</a></li>

</ul>
 <div class="hero">
   <img src="index.jpeg." alt="event" width="100%" height="90%">
   <div class="text">
    <h1>
     EVENT PLANNER
    </h1>
    <p>
     <b>Perfect Events, Just for You
    </p></b>
       </div>
  </div>
</body>
</html>