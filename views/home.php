<?php ob_start();
session_start(); ?>

    <!--vitrine-->
    <section class="hero d-flex flex-column align-items-center justify-content-center mx-0">
          <div class="text-center">
            <p class="p_ftLogo2">Vans</p>
            <h2 class="display-3 text-white">Le meilleur site d'enchère pas OUF</h2>
            <h5 class="text-secondary text-white">Avec un brin de php et une base mysql</h5>
          </div>
        </div>
    </section>

<section>
    <div class="list">
        <?php
        require __DIR__ . "/popup.php";
        ?>
    </div>

</section>

<script>
    let r = false;

    let doc = document.querySelectorAll(".cardA .image, .cardA .info");

    doc.forEach(box => {
        box.addEventListener("click", function(e) {
            console.log("hello", box.parentElement);
            console.log("hello", e.target.parentElement.id);

            if (r == true || r == null) {
                box.parentElement.classList.remove("active");
                document.querySelector(".list").classList.remove("active");
                document.querySelector("body").classList.remove("active");
                r = false;
            } else if (r == false) {
                box.parentElement.classList.add("active");
                document.querySelector(".list").classList.add("active");
                document.querySelector("body").classList.add("active");
                r = true;
            }
        });
    })
</script>

<?php
$content = ob_get_clean();
require_once("navigation.php");
