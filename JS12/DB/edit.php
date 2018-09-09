<?php 
    require './config.php';
    require './DB.class.php';
    $db = DB::table('user');
    $row = $db->find(5);
    // var_dump($row);
    // exit;
?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>编辑用户</h2>
    <form action="./index.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        name:
        <input type="text" name="name" placeholder="请输入用户名" value="<?php echo $row['name'] ?>"><br><br>
        sex:
        <input type="radio" name="sex" value="0" <?php echo $row['id']==0?'checked':''; ?>>女
        <input type="radio" name="sex" value="1" <?php echo $row['id']==1?'checked':''; ?> checked>男
        <input type="radio" name="sex" value="2" <?php echo $row['id']==2?'checked':''; ?>>保密<br><br>
        age:
        <input type="text" name="age" value="<?php echo $row['age'] ?>"><br><br>
        province:
        <select name="province">
            <option value="江苏" <?php echo $row['province']=='江苏'?'selected':''; ?>>江苏</option>
            <option value="上海" <?php echo $row['province']=='上海'?'selected':''; ?>>上海</option>
            <option value="新疆" <?php echo $row['province']=='新疆'?'selected':''; ?>>新疆</option>
            <option value="浙江" <?php echo $row['province']=='浙江'?'selected':''; ?>>浙江</option>
            <option value="北京" <?php echo $row['province']=='北京'?'selected':''; ?>>北京</option>
            <option value="深圳" <?php echo $row['province']=='深圳'?'selected':''; ?>>深圳</option>
            <option value="纽约" <?php echo $row['province']=='纽约'?'selected':''; ?>>纽约</option>
        </select><br><br>
        <input type="hidden" name="vcode" value='6888'>
        <input type="hidden" name="hot" value='1'>
        <input type="hidden" name="use" value='1'>
        <input type="submit" value="保存">
    </form>
</body>
</html>