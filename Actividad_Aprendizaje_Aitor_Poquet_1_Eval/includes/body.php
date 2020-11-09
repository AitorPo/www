<div id="main">

<h1>Últimas entradas</h1>

<?php $topics = getTopics($db, null, 5);

if(!empty($topics)): 
    foreach($topics as $topic):
?>

<article class="posts">
<a href="topic.php?id=<?=$topic['to_id']?>">
        <h2><?=$topic['to_title']?></h2>
        <span class="date"><?=$topic['to_date']?> | <?=$topic['u_name']?></span>

</a>

<p>
                <?=substr($topic['to_content'],0,200)?>
            </p>
</article>
<?php 
    endforeach;
endif;
?>
<!-- END OF MAIN -->
</div>