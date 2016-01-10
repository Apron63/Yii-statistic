<?php
use yii\helpers\Html;
?>
<div class="post">
   <p> <?= Html::button($model->pr_name, ['class' => "btn btn-primary", 
                                          'onclick' => "buttonPressed(this)",
                                          'data-id' => $model->pr_id,
                                         ]);
        ?>
   </p>
</div>