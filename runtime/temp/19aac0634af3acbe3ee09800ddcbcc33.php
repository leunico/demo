<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\albert\www\demo\public/../application/admin\view\Widget\fontAwesome.html";i:1510135214;}*/ ?>
<?php foreach($icon as $vo): ?>
    <option value="<?php echo $vo; ?>" <?php if($vo == $value): ?>selected<?php endif; ?>><i class="fa fa-<?php echo $vo; ?>"></i><?php echo $vo; ?></option>
<?php endforeach; ?>