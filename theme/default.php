<style>
  @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700);
*{margin:0;padding:0;outline:0}
body{font-family: 'Source Sans Pro', sans-serif;font-size:14px;line-height:18px;color:#000;background:url(images/bg.png)repeat fixed 0 0 #fff;}

.templete{width:960px;margin:0 auto;}
.contemplete {
  margin: 0 auto;
  width: 928px;
}
.clear{overflow:hidden;}
input[type="text"], input[type="email"] {
  border: 1px solid #cfc5b6;
  border-radius: 3px;
  margin-bottom: 5px;
  padding: 5px;
  width: 300px;
}
input[type="submit"] {
  background: #b7801c none repeat scroll 0 0;
  border: 1px solid #e6af4b;
  color: #fff;
  cursor: pointer;
  font-size: 20px;
  padding: 1px 10px;
}
input[type="submit"]:hover{background:#FEF4E5;color:#000;}
textarea {
  height: 110px;
  margin-bottom: 10px;
  padding: 5px;
  width: 300px;
   border: 1px solid #cfc5b6;
}
.headersection {
  background: #ca932f none repeat scroll 0 0;
  color: #fff;
}
.logo {
  float: left;
  width: 580px;
}
.logo img {
  float: left;
  margin-right: 15px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-top: 10px;
  width: 70px;
}
.logo h2 {
  color: #fff;
  font-size: 32px;
  margin-bottom: 11px;
  margin-top: 24px;
  text-shadow: 2px 2px 0 #666;
}
.logo p{color:#fff;}
.social {
  float: right;
  margin-right: 20px;
  margin-top: 12px;
  text-align: right;
  width: 360px;
}
.icon {
  float: right;
}
.icon a {
  background: #a56e0a none repeat scroll 0 0;
  border-radius: 2px;
  color: #fff;
  display: block;
  float: left;
  font-size: 20px;
  margin-left: 3px;
  padding: 5px 10px;
}
.icon a:hover{background:#fff;color:#333}

.searchbtn {
  float: right;
  margin-top: 8px;
}
.searchbtn input[type="text"] {
  border: 1px solid #A56E0A;
  width: 200px;
  background: #FFE07C;
  font-size: 16px;
  height: 30px;
}
.searchbtn input[type="submit"] {
  border: 1px solid #9d6602;
  border-radius: 3px;
  font-size: 18px;
  height: 30px;
  padding-left: 10px;
  padding-right: 10px;
  padding-top: 0;
  cursor: pointer;
}
.searchbtn input[type="submit"]:hover{
	background: #b7801c none repeat scroll 0 0;
	border: 1px solid #e6af4b;
	color:#fff;
}
.myicon {
  margin: 0 auto;
  width: 280px;
}
.myicon i {
  border: 1px solid #ca932f;
  border-radius: 5px;
  color: #ca932f;
  font-size: 180px;
  padding: 0 28px;
}

.navsection {
  background: none repeat scroll 0 0 #e6af4b;
  min-height: 38px;
}
.navsection ul{margin:0;padding:0;list-style:none;}
.navsection ul li {
  border-left: 1px solid #fdc662;
  border-right: 1px solid #c18a26;
  display: block;
  float: left;
  position:relative;
}
.navsection ul li:first-child{border-left: 0px solid #fdc662;}
.navsection ul li:last-child{border-right: 0px solid #c18a26;}

.navsection ul li a {
  color: #fff;
  display: block;
  font-size: 20px;
  font-weight: bold;
  padding: 10px;
  text-decoration: none;
}
.navsection ul li a:hover, #active{background:#FEF4E5;color:#333;}

.navsection ul li ul {
  left: -999999px;
  position: absolute;
  z-index: 999;
}
.navsection ul li:hover ul{left:0px;}
.navsection ul li ul li{background:#E6AF4B;width:200px;border-bottom:1px solid #CA932F;float: none;border-left:0px solid #fdc662;border-right:0px solid #c18a26;}
.navsection ul li ul li:last-child{border-bottom:0px solid #CA932F;}
.navsection ul li ul li a{}



.item{
position:relative;
margin:200px 0;
 width:300px;
 height:200px;
 overflow:hidden;
}
.item img {
 width:300px;
 height:200px;

}
.overlay{
	position:absolute;
	width:100%;
	height:100%;
	background:rgba(0,0,0,.5);
	top:-100%;
	transition:.8s;
}
.item:hover .overlay{top:0}



.slidersection {}
.contentsection {
  background: #ffffff none repeat scroll 0 0;
  border: 1px solid #ca932f;
  padding: 15px;
}
.maincontent {
  background: #fef4e5 none repeat scroll 0 0;
  border: 1px solid #ded4c5;
  float: left;
  margin: 0 15px 15px 0;
  padding: 8px 15px;
  width: 606px;
}
.about {
  font-size: 16px;
  line-height: 24px;
  text-align: justify;
}
.about img {
  background: #fff none repeat scroll 0 0;
  border: 1px solid #b7801c;
  float: left;
  height: 190px;
  margin-right: 10px;
  padding: 5px;
  width: 300px;
}
.about p {
  font-size: 16px;
  line-height: 24px;
  margin-bottom: 10px;
  text-align: justify;
}
.pagination{
   display: block;
   font-size: 20px;
   font-family:verdana;
   margin-top: 10px;
   padding: 10px;
   text-align: center;
   
}
.pagination a{
   background: e6afb4 none repeat scroll 0 0; 
   border: 1px solid #a7700c;
   border-radius: 3px;
   color: #333;
   margin-left: 3px;
   padding: 2px 10px;
   text-decoration: none;
}
.pagination a:hover{
 background: e6afb4 none repeat scroll 0 0;    
}
.notfound {
  min-height: 400px;
  padding-top: 100px;
}
.notfound p {
  font-size: 100px;
  font-weight: bold;
  line-height: 137px;
  text-align: center;
}
.notfound p span {
  color: #ff0000;
  display: block;
  font-size: 200px;
}
.relatedpost{}
.relatedpost h2 {
  background: #e6af4b none repeat scroll 0 0;
  border-bottom: 2px solid #b7801c !important;
  color: #000 !important;
  margin-bottom: 8px !important;
  margin-top: 15px;
  padding-left: 10px !important;
}
.relatedpost img {
  height: 100px;
  margin-bottom: 10px;
  width: 180px;
}
.relatedpost img:hover{opacity:0.4}
.samepost {
  font-weight: normal;
  font-size: 16px;
  line-height: 24px;
  text-align: justify;
}
.samepost h2, .about h2 {
  border-bottom: 2px solid #e0d6c7;
  color: #ac7511;
  font-size: 25px;
  margin-bottom: 4px;
  padding: 10px 10px 10px 0;
}
.samepost h2 a{
  color: #ac7511;
  text-decoration: none;
}
.samepost h4,.about h4 {
  font-weight: normal;
  margin-bottom: 10px;
  margin-top: 0;
}
.samepost h4 a, .about h4  a{text-decoration:none;color:#3399FF;}
.samepost img {
  background: #fff none repeat scroll 0 0;
  border: 1px solid #ebb450;
  float: left;
  margin-right: 10px;
  padding: 5px;
  width: 200px;
}
.samepost p {
  font-size: 16px;
  line-height: 23px;
  text-align: justify;
}
.readmore {
  float: right;
  margin-top: 10px;
}
.readmore a {
  background: #fff none repeat scroll 0 0;
  border: 1px solid #b7801c;
  border-radius: 3px;
  color: #b7801c;
  display: block;
  font-size: 17px;
  padding: 4px 8px;
  text-decoration: none;
}
.readmore a:hover{color:#E16525;}
.sidebar {
  background: #fef4e5 none repeat scroll 0 0;
  border: 1px solid #ded4c5;
  float: right;
  margin-bottom: 15px;
  margin-top: 0;
  padding: 10px;
  width: 253px;
}
.samesidebar {
  margin-bottom: 10px;
}
.samesidebar h2 {
  background: #e6af4b none repeat scroll 0 0;
  border-bottom: 2px solid #b7801c;
  color: #333;
  margin-bottom: 8px;
  padding: 10px;
}
.samesidebar ul{padding:0;margin:0;list-style:none;}
.samesidebar ul li {
  border-bottom: 1px dashed #e9c05c;
  font-size: 16px;
  padding: 5px 8px 5px 0;
}
.samesidebar ul li:last-child{border-bottom: 0px dashed #e9c05c;}
.samesidebar ul li a {
  color: #814a00;
  text-decoration: none;
}
.samesidebar ul li a:hover{color:#DF5C25;}
.samesidebar p {
  margin-bottom: 10px;
}
.popular {
  margin-bottom: 20px;
}
.popular h3 {
  border-bottom: 1px dashed #b7801c;
  font-size: 20px;
  font-weight: normal;
  margin-bottom: 10px;
  padding-bottom: 5px;
}
.popular h3 a{text-decoration:none;color:#444}
.popular img {
  background: #fff none repeat scroll 0 0;
  border: 1px solid #f6bf5b;
  border-radius: 30px;
  float: left;
  height: 40px;
  margin-right: 10px;
  margin-top: 5px;
  padding: 3px;
  width: 55px;
}
.popular p{}
.footersection{height:90px;background:#B7801C;text-align:center}
.footermenu {
  margin-top: 25px;
  margin-bottom: 5px;
}
.footermenu ul{padding:0;margin:0;list-style:none;text-align:center;}
.footermenu ul li{display:inline-block;}
.footermenu ul li a {
  color: #E6AF4B;
  font-size: 18px;
  margin-right: 5px;
}
.footersection p{}

.fixedicon {
  left: 0;
  position: fixed;
  top: 175px;
  width: 60px;
}
.fixedicon img {
  width: 50px;
}

/*Example items*/
.items{
  height: 250px;
  width: 400px;
  margin:0 auto;
  position:relative;
  overflow:hidden;
}
.items img {
  height: 250px;
  width: 400px;
}
.shadow{
 background:rgba(0, 0, 0, .6);
 height: 100%;
 width: 100%;
 position:absolute;
 top:-100%;
 transition:.6s;
 -webkit-transition:.6s;
 -moz-transition:.6s;
 transition:.6s;
}
.items:hover .shadow{top:0}  
    
</style>