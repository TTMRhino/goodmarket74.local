<div class="admin-default-index">
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">

            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <h1 class="text-center">Меню</h1>

    <div class="list-group">        
        <a href="/admin/items" class="text-center list-group-item list-group-item-action list-group-item-info">Товары</a>
        <a href="/admin/maingroup" class="text-center list-group-item list-group-item-action list-group-item-info">Основные Категории</a>
        <a href="/admin/subgroup" class="text-center list-group-item list-group-item-action list-group-item-info">Подкатегории</a>
        <a href="/admin/orders" class="text-center list-group-item list-group-item-action list-group-item-info">Заявки</a>
        <a href="/admin/default/change-password" class="text-center list-group-item list-group-item-action list-group-item-info">Сменить пароль</a>
        
    </div>

    </ul>
</div>
