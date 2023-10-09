<?php
session_start();


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="refresh" content="20"> -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

    <title>Homepage</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;

        }
        
        body {
            background-color: #e3f2fd;
        }

        .nav-item {
            padding: 0px 15px;
            
        }
        
  /* Hide the scrollbar */
  body::-webkit-scrollbar {
    width: 0;
    background: transparent;
  }

        .rounded-photo {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover; 
    margin-left: -25px; /* Add negative margin-left to move the photo a bit to the left */
}

body{
    width: 100vw;
    height: 100%;
    background-image: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url(images/background2.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
    </style>
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #7D7C7C;">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">salonSite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contact Us</a>
                </li>
            </ul>
            

            <!-- Right-aligned items -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="#">Welcome name</a>
                </li>
                <li class="nav-item">
                    <img src="#" alt="user Photo" class="rounded-photo">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">LogOut</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio recusandae ducimus deserunt porro, optio sunt omnis quo expedita, sint odit accusamus? Atque aspernatur sit architecto natus eum laudantium impedit, odio aut amet doloremque quo obcaecati deleniti minima quasi quidem assumenda illum magnam porro dolorem hic nam quam vitae corrupti! Eum explicabo aliquid perferendis hic consectetur, incidunt inventore magnam sequi quas aperiam rem officia quae qui consequatur ipsam! Ipsam distinctio fugit ut saepe dolorem soluta, cumque porro architecto cum deserunt veniam id, beatae explicabo reiciendis excepturi sint recusandae quae ex corporis cupiditate non! Cupiditate optio eum aperiam, repellendus eos et delectus corporis quia omnis explicabo asperiores! Minima, explicabo quos sint aliquam dolores perferendis velit ad hic atque quod nihil commodi alias aliquid magni vel pariatur quisquam, consectetur eius ipsam obcaecati! Et vel quis itaque nulla? Ad tempora voluptas repellat accusamus maxime veritatis? Esse blanditiis excepturi impedit vero ut voluptate consectetur, ea quisquam, cupiditate iure sed! Quisquam eaque explicabo, doloremque dolorem cum voluptates voluptatem! Eveniet repellendus facere rem, tenetur adipisci atque ea accusantium ut blanditiis, commodi magni esse perferendis, dolorum incidunt repellat? Consequuntur assumenda, quisquam qui et obcaecati voluptatum doloribus sed neque quam minima provident nulla amet laborum ratione doloremque atque fuga nam accusamus. Earum rem optio assumenda, illum qui nihil possimus illo aut, cum autem sint recusandae facilis enim at fuga, ratione numquam exercitationem? Fugiat nisi iure molestiae, quidem accusamus error rerum corporis asperiores dolores cupiditate sunt. Expedita laborum quae illo dignissimos temporibus, accusantium reprehenderit magni culpa at exercitationem molestiae esse error distinctio ipsam ut dicta iste eaque, saepe inventore? Corrupti atque soluta recusandae! Soluta a adipisci odit dignissimos alias nesciunt voluptate quidem ab corporis numquam nobis eveniet atque quae, aperiam quam obcaecati, vitae sint excepturi aspernatur illum magni esse necessitatibus recusandae. Repellat officia harum molestias facere necessitatibus voluptates, nam in dicta libero. Animi, omnis? Ab at facere sit voluptatem provident aut repellendus possimus illo? In totam, reprehenderit rem ad ducimus quis possimus quibusdam labore sit non inventore ipsa cum itaque quae, harum molestias quasi! Veritatis tenetur inventore molestiae repudiandae eveniet ex neque accusamus vitae provident tempora, ab officia enim praesentium rerum. Qui quasi nobis vero ducimus voluptate veritatis! Laudantium at sapiente atque distinctio provident dicta. Laudantium, minus, dignissimos minima sit impedit mollitia, quo unde earum eveniet error harum eaque asperiores illo maxime autem tenetur doloribus? Fugit asperiores quod placeat assumenda, expedita voluptate sapiente, ipsa unde exercitationem harum aliquam repellendus repellat ea incidunt, modi dicta possimus veritatis accusantium qui aliquid maxime ex ipsam esse! Voluptatem quibusdam ipsum vitae velit aliquam eaque quod deserunt modi architecto culpa obcaecati facere nostrum, maiores corrupti? Obcaecati, sapiente aliquam eligendi saepe fuga iste dolorem error placeat autem esse iure, amet, ducimus neque necessitatibus? Distinctio alias aliquam temporibus vitae quidem corrupti, architecto dolorem culpa laboriosam voluptatum doloremque sunt pariatur quisquam ab assumenda nulla consequatur praesentium maxime inventore atque magni doloribus excepturi adipisci! Ducimus, officia corporis, odio accusamus, optio ut repellendus maiores doloremque dolorem praesentium provident dicta id mollitia doloribus quam fuga inventore possimus minima. Consectetur, tempora dolorem.
</div>
<div> kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk                                                   lllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllldsafjkal;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;afdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, fugit suscipit. Neque iet voluptatum totam saepe, eum mollitia a exercitationem cupiditate voluptatem dolores, tenetur optio? Ut voluptatum beatae maiores laboriosam magni maxime tenetur sit perferendis voluptates eligendi facilis perspiciatis quo quod, officiis ea commodi tempora, corrupti quam quas praesentium aut. Molestiakkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkks eum totam vitae consequuntur quasi alias obcaecati soluta aliquam quo ipsam corporis rem corrupti necessitatibus harum, accusantium enim velit culpa fuga doloribus suscipit quis facere. Accusamus delectus temporiblllllllllllllllllllllllllllllllllllllllllllus vitae dolorum nostrum perferendis maxime a. Dolorem illum vel totam obcaecati magni impedit iure quos? A ipsam magni pariatur voluptates explicabo perferendis fuga exercitationem in, excepturi ipsum laudantium consectetur doloddddddddddddddddddddddddddddddddrum quia quidem, culpa autem molestiae, nihil nisi dolores rerum assumenda. Cupiditate, corporis repellendus esse, ex illum quasi eum nostrum, distinctio sapiente rerum voluptas fuga explicabo repudiandae. Ex provident, a quos molestiae quidem officiis quas? Quidem quibusdam exercitationem ipsum modi nesciunt expedita voluptate minus quae voluptatem, magni distinctio est commodi id architecto harum mollitia. Deleniti ullam iure suscipit magni, illo corrupti eum, praesentium placeat libero laudantium commodi voluptatem blanditiis pariatur. Sunt magni a non natus quam hic temporibus impedit aut excepturi! Possimus laborum odit blanditiis voluptas saepe vel tempore unde, incidunt nisi consequddaaaaaaafsdfaaaaaaddddddatur doloribus ab sapiente ex omnis. Quod commodi porro doloribus accusamus officiis eligendi totam aut deleniti, hic nisi consequatur fugiat a similique voluptate, placeat fugit ullam? Odit alias veritatis quae sequi libero, unde, magni veniam nisi totam eveniet at placeat atque magnam debitis vero adipisci ipsam quam porro necessitatibus, numquam tempore? Consectetur recusandae unde vitae nulla fugit libero tempore pariatur accusamus quaerat culpa itaque ullam consequuntur quasi beatae dolorem quibusdam, odit digdadeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeenissimos nisi. Corporis, voluptatem! Perferendis provident at odit, consequatur, voluptatibus laboriosam labore doloribus fugit dignissimos excepturi odio minima eum maiores, ex placeat soluta voluptas vitae ratione inventore iure ab eligendi aperiam voluptatum? Libero temporibus nam, eaque, quasi suscipit, doloribus amet nobis sed cumque architecto voluptatum sequi? Error maiores hic est vel eligendi, cum rem illo quia adipisci exercitationem sit architecto nisi ad voluptatem ab quos laudantium lore when those peopole were there that time only u had to ask no then and then they goes eeeeeeeeeeeeeeeeeeeeeeeethere so the question is not mine pariatur eum odit? Velit enim est perspiciatis deserunt dolores ducimus, doloribus sunt nam dolor magni ab dicta, voluptas omnis cupiditate nesciunt recusandae animi quia explicabo maxime quas, soluta optio eligendi! Nostrum mauibusdam est eius, officiis dolore modi dicta animi culpa nostrum dolores velit provident repellat molestiae rem, voluptatum corporis ipsam nam et! Soluta minima neque iusto rerum, incidunt vel, aspernatur voluptatibus cum veritatis aperiam voluptates placeat blanditiis laboriosam cumque ad quas dolores vero totam, corporis modi! Ratione autem nam officiis dolorem nihil quod officia incidunt, temporibus, placeat doloribus doloremque reprehenderit accusantium et? A optio recusandae officia non ut, minima modi nam aut voluptatem quasi necessitatibus rerum?
</div>


<footer class="main-footer text-center">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 salonSite.com</strong>
    All rights reserved.
</footer>

</body>
</html>
