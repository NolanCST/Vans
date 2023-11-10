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

    let achatInput = document.querySelector(".cardA.active .info");
            
            if(achatInput !== null){
                let div = document.createElement('div');

                div.innerHTML = `
                    <form action="" method="post">
                        <input type="number" name="new_valeur" id="new_valeur" placeholder="votre prix">
                        <button type="submit">valider</button>
                    </form>`;

                achatInput.prepend(div);
            }
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
