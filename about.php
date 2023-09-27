<?php
    
    include ('includes/header.php'); 
    include 'db_config.php';
    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
    header('location:login.php');
    }
?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./css/aboutpage.css">
</head>
<body>
    <section id="ourStory" >
        <div class="container">
            <div class="ourStory__wrapper">
                <div class="ourStory__img">
                    <img src="./img/Shopper.png"  alt="chef">
                </div>
                <div class="ourStory__info">
                    <h3 class="ourStory__title">
                        Our Story
                    </h3>
                    <p class="ourStory__subtitle">
                        It all started since 2023
                    </p>
                    <p class="ourStory__text">
                        
                        Our story begins with a vision to revolutionize the online shopping experience 
                        and provide customers with a one-stop destination for all their needs. 
                        Inspired by the rapidly growing demand for ecommerce platforms, 
                        we set out to create something truly unique and impactful. 
                        After months of meticulous planning, market research, and collaboration, 
                        SmartPickz was born. 
                        <br>
                        <br>
                        We wanted to offer shoppers a seamless and enjoyable experience, 
                        where they could effortlessly browse through a vast array of products, 
                        ranging from electronics to clothing and shoes. With a focus on quality 
                        and affordability, we handpicked the best brands and ensured competitive 
                        prices to cater to the diverse needs of our valued customers.
                        <br>
                        <br>
                        Today, we are proud to see SmartPickz thrive as a trusted and preferred 
                        ecommerce platform, constantly striving to exceed customer expectations and 
                        provide an unrivaled online shopping journey. 
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <section id="whyUs" >
        <div class="container">
            <div class="whyUs__wrapper">
                <div class="whyUs__left" >
                    <h2 class="whyUs__title">
                        Why Choose Us?
                    </h2>
                    <p class="whyUs__text">
                       <strong>Why Not Us?</strong> When it comes to online shopping, 
                       SmartPickz stands out as the ultimate choice for savvy consumers. 
                        SmartPickz offers an unparalleled selection of products ensuring that 
                        shoppers can find everything they need in one convenient place.
                         
                        <br>    
                            Additionally, SmartPickz is committed to providing top-notch customer service, 
                                ensuring a seamless and enjoyable shopping experience from start to finish. 
                        </br>
                        
                    </p>
                </div>
                <div class="whyUs__right" >
                    <div class="whyUs__items__wrapper">
                        <div class="whyUs__item">
                            <img src="./img/earbuds.png" alt="">
                        </div>
                        <div class="whyUs__item">
                            <img src="./img/airjordan.png" alt="">
                        </div>
                        <div class="whyUs__item">
                            <img src="./img/Shirts.png" alt="">
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
   include ('includes/footer.php');
    
?>
</html>