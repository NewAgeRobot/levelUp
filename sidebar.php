<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/dropit.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.menu').dropit();
});
</script>
<style type="text/css">
  .dropit {
    list-style: none;
  padding: 0;
  margin: 0;
}
.dropit .dropit-trigger { position: relative; }
.dropit .dropit-submenu {
    position: absolute;
    top: 100%;
    left: 0; /* dropdown left or right */
    z-index: 1000;
    display: none;
    min-width: 150px;
    list-style: none;
  padding: 0;
  margin: 0;
}
.dropit .dropit-open .dropit-submenu { display: block; }
</style>
</head>
<body>
<ul class="menu">
    <li>
        <a href="#">Dropdown</a>
        <ul>
            <li><a href="#">Some Action 1</a></li>
            <li><a href="#">Some Action 2</a></li>
            <li><a href="#">Some Action 3</a></li>
            <li><a href="#">Some Action 4</a></li>
        </ul>
    </li>
</ul>
</body>
</html>
