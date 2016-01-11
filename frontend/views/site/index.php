<?php
use yii\widgets\ListView;

/* @var $this yii\web\View */

$this->title = 'Сплит-тестирование';
?>
<div class="site-index">
    <div class="body-content">

    <?= ListView::widget( [
        'dataProvider' => $dataProvider,
        'itemView' => '_list',
        ]
    );?>

    </div>
</div>
<script>

function buttonPressed(el) {
    var pr_id = el.attributes[0].value;
    //alert(el.attributes[0].value);
    $.ajax({
        type: "GET",
        url: <?= '"index.php?r=site/linkurl"' ?>,
        data: "id=" + pr_id,
    })
    .done(function(data) {
        if (data == "") {
            alert("Внимание! Проект не имеет ссылок!");
        } else {
            document.location.href = " + data + ";
            //alert("Переход по ссылке : " + data);
        }
    })
    .fail(function(data) {
        alert("Ошибка запроса");
    });
}
</script>