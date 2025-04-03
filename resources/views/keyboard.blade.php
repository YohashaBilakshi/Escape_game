<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Claymorphism Keyboard</title>
  <link rel='stylesheet' href='https://unpkg.com/claymorphism-css/dist/clay.css'>
  <!-- <link rel="stylesheet" href="./style.css"> -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap');
body{
  background:#FAFAFA;
  overflow:hidden;
  height:100vh;
  font-family: 'Montserrat', sans-serif;
  font-weight:600;
  display: flex;
  flex-direction:column; 
  justify-content:flex-end;
  align-items:center;
}

.keyboard{
  width: 850px;
  position: absolute;
  left: 50%;
  top: 75%;;
  transform: translate(-50%,-50%);
}
.row{
  padding:5px;
  list-style-type:none;
  display:flex;
  justify-content: space-evenly;
}

.row div{
  display: flex;
}
.key{
  display:flex;
  justify-content:center;
  align-items:center;
  width: 37px;
    height: 31px;
  --clay-background:#ebebeb;
  --clay-border-radius: 15px;
  background: #ebebeb;
  border-radius: 10px;
 }
.key:hover{
  cursor:pointer;
  transition:0.3s;
  --clay-shadow-inset-primary: 0 0 5px 5px #d3d3d3;
}

#esc{
  width: 35px;
  --clay-border-radius:10px;
  background: palegreen;
  --clay-background:palegreen;
}
#esc:hover{
    --clay-shadow-inset-primary: 0 0 5px 5px	lightgreen;
}
#del{
  width: 75px;
  background: #AFEEEE;
  --clay-background:#AFEEEE;
}
#del:hover{
  --clay-shadow-inset-primary: 0 0 5px 5px 	#B0E0E6;
}
#tab{
  width:70px;
  background: #FF7F50;
  --clay-background:#FF7F50
}
#tab:hover{
 --clay-shadow-inset-primary: 0 0 5px 5px	indianred;
}
#caps{
  width: 80px;
  --clay-background: #00dbff;
}
#caps:hover{
   --clay-shadow-inset-primary: 0 0 5px 5px	#10A5F5;
}
#enter{
  width: 80px;
  --clay-background: 	#40E0D0;
}
#enter:hover{
  --clay-shadow-inset-primary: 0 0 5px 5px		#00CED1;
}
#slash{
  width: 60px;
}
#shift{
  width:110px;
  --clay-background: 	#6495ED;
}
#shift:hover{
  --clay-shadow-inset-primary: 0 0 5px 5px #527fd1;
}
#shift2{
  width:70px;
  --clay-background: #87CEFA;
}
#shift2:hover{
    --clay-shadow-inset-primary: 0 0 5px 5px #79bde8;
}
#ctrl{
  --clay-background:#DC143C;
}
#ctrl:hover{
  --clay-shadow-inset-primary: 0 0 5px 5px #ba1133;
}
#fn{
  --clay-background: orange;
}
#fn:hover{
  --clay-shadow-inset-primary: 0 0 5px 5px darkorange;
}
#win{
  --clay-background: mediumpurple;
}
#win:hover{
 --clay-shadow-inset-primary: 0 0 5px 5px slateblue;
}
#alt{
  --clay-background: #778899;
}
#alt:hover{
   --clay-shadow-inset-primary: 0 0 5px 5px 	#708090;
}
#space{
  width: 300px;
  --clay-background: url("https://i.ibb.co/9qLH1SB/constellation-pattern.jpg");
  background-size: cover;
  filter: brightness(200%);
}
#space:hover{
  filter: brightness(80%);
}
#altgr{
  --clay-background: lightgray;
}
#altgr:hover{
  --clay-shadow-inset-primary: 0 0 5px 5px silver;
}
#menu{
  --clay-background: red;
}
#menu:hover{
    --clay-shadow-inset-primary: 0 0 5px 5px #d90000;
}
#ctrl2{
  --clay-background: chocolate;
}
#ctrl2:hover{
  --clay-shadow-inset-primary: 0 0 5px 5px sienna;
}

footer{
  font-size: 12px;
  color: silver;
  margin-bottom:1rem;
}

footer a{
  text-decoration:none;
  font-style: italic;
  color: paleviolet;
}
  </style>
</head>
<body>
<div id="keyboard-box" class="keyboard">
  <ul class="row">
    <li class="key clay">1</li>
    <li class="key clay">2</li>
    <li class="key clay">3</li>
    <li class="key clay">4</li>
    <li class="key clay">5</li>
    <li class="key clay">6</li>
    <li class="key clay">7</li>
    <li class="key clay">8</li>
    <li class="key clay">9</li>
    <li class="key clay">0</li>
  </ul>
  <ul class="row">
    <li class="key clay">A</li>
    <li class="key clay">C</li>
    <li class="key clay">T</li>
    <li class="key clay">M</li>
    <li class="key clay">S</li>
    <li class="key clay">I</li>
    <li class="key clay">U</li>
    <li class="key clay">K</li>
    <li class="key clay">O</li>
    <li class="key clay">P</li>
  </ul>
</div>

  <script src='https://unpkg.com/react@17/umd/react.development.js'></script>
<script src='https://unpkg.com/react-dom@17/umd/react-dom.development.js'></script>
</body>

<script>

</script>
</html>
