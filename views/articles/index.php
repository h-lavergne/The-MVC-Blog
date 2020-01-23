<?php
/* @var GlobalController $this */
/* @var Model $category */
require "views/partials/header.php";
?>

    <!--    <a class="btn btn-default" href="/index.php?page=show_movies&id=--><?php //echo $value['id']; ?><!--">Info</a>-->

    <div class="container mt-5 mx-0">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($this->db->readAll("articles") as $article): ; ?>
                <tr class="border">
                    <td class="border"><?= $article["id"] ?></td>
                    <td class="border"><?= $article["title"] ?></td>
                    <td class="w-50 border"><?php
                        echo substr($article["description"], 0, 120) . "..."
                        ?>
                    </td>
                    <?php foreach ($this->db->getCategoryFromArticle($article["category_id"]) as $category): ; ?>
                        <td class="border"><?= $category["title"] ?></td>
                    <?php endforeach ?>


                    <td><a href="/index.php?page=show_article&id=<?php echo $article['id'] ?>"
                           class="btn btn-primary rounded-pill">Info</a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>


<?php
require "views/partials/footer.php";
?>