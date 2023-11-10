<?php ob_start(); ?>

<section>
    <div class="list">
        <?php
        require __DIR__ . "/truc.php";
        ?>
    </div>
    <div class="filter"></div>
</section>

<script>
    let r = false;

    let doc = document.querySelectorAll(".cardA");

    doc.forEach(box => {
        box.addEventListener("click", function(e) {
            console.log("hello", box);
            console.log("hello", e.target.parentElement.id);

            if (r == true || r == null) {
                box.classList.remove("active");
                document.querySelector(".list").classList.remove("active");
                r = false;
            } else if (r == false) {
                box.classList.add("active");
                document.querySelector(".list").classList.add("active");
                r = true;
            }
        });
    })
</script>

<?php
$content = ob_get_clean();
require_once("navigation.php");
