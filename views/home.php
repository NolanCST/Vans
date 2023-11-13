<?php ob_start();
session_start(); ?>

<section>
    <div class="list">
        <?php
        require __DIR__ . "/popup.php";
        ?>
    </div></div>
    <div class="filter"></div>

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
