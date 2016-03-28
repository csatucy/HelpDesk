//----------DHTML Menu Created using AllWebMenus PRO ver 5.1-#740---------------
//F:\Websites\DW Templates\webtwo\menu.awm
var awmMenuName='menu';
var awmLibraryBuild=740;
var awmLibraryPath='/awmdata';
var awmImagesPath='/awmdata/menu';
var awmSupported=(navigator.appName + navigator.appVersion.substring(0,1)=="Netscape5" || document.all || document.layers || navigator.userAgent.indexOf('Opera')>-1 || navigator.userAgent.indexOf('Konqueror')>-1)?1:0;
if (awmAltUrl!='' && !awmSupported) window.location.replace(awmAltUrl);
if (awmSupported){
var nua=navigator.userAgent,scriptNo=(nua.indexOf('Safari')>-1)?7:(nua.indexOf('Gecko')>-1)?2:((document.layers)?3:((nua.indexOf('Opera')>-1)?4:((nua.indexOf('Mac')>-1)?5:1)));
var mpi=document.location,xt="";
var mpa=mpi.protocol+"//"+mpi.host;
var mpi=mpi.protocol+"//"+mpi.host+mpi.pathname;
if(scriptNo==1){oBC=document.all.tags("BASE");if(oBC && oBC.length) if(oBC[0].href) mpi=oBC[0].href;}
while (mpi.search(/\\/)>-1) mpi=mpi.replace("\\","/");
mpi=mpi.substring(0,mpi.lastIndexOf("/")+1);
var e=document.getElementsByTagName("SCRIPT");
for (var i=0;i<e.length;i++){if (e[i].src){if (e[i].src.indexOf(awmMenuName+".js")!=-1){xt=e[i].src.split("/");if (xt[xt.length-1]==awmMenuName+".js"){xt=e[i].src.substring(0,e[i].src.length-awmMenuName.length-3);if (e[i].src.indexOf("://")!=-1){mpi=xt;}else{if(xt.substring(0,1)=="/")mpi=mpa+xt; else mpi+=xt;}}}}}
while (mpi.search(/\/\.\//)>-1) {mpi=mpi.replace("/./","/");}
var awmMenuPath=mpi.substring(0,mpi.length-1);
while (awmMenuPath.search("'")>-1) {awmMenuPath=awmMenuPath.replace("'","%27");}
document.write("<SCRIPT SRC='"+awmMenuPath+awmLibraryPath+"/awmlib"+scriptNo+".js'><\/SCRIPT>");
var n=null;
awmzindex=1000;
}

var awmImageName='';
var awmPosID='topNavigation';
var awmSubmenusFrame='';
var awmSubmenusFrameOffset;
var awmOptimize=0;
var awmUseTrs=0;
var awmSepr=["0","","",""];
function awmBuildMenu(){
if (awmSupported){
awmImagesColl=["main-header.jpg",4,39,"main-footer.jpg",4,39,"indicator.png",9,32,"main-button-tile.jpg",21,39,"main-buttonOver-tile.jpg",21,39,"main-buttonOver-left.jpg",15,39,"main-buttonOver-right.jpg",15,39,"icon-awm.gif",16,16,"hassubmenu.gif",4,7,"sub-button-tile.jpg",20,26,"sub-buttonOver-tile.jpg",20,26,"sub-button-left.jpg",34,26,"sub-buttonOver-left.jpg",34,26,"sub-button-right.jpg",34,26,"sub-buttonOver-right.jpg",34,26,"separator.jpg",227,2,"spacer.gif",1,1,"icon-wa.gif",16,16,"icon-trio.gif",16,16,"icon-td.gif",16,16,"icon-hd.gif",16,16,"icon-awmlite.gif",16,16,"icon-lwbm.gif",16,16,"icon-pfs.gif",16,16,"icon-pfsdownload.gif",16,16,"icon-pfshelp.gif",16,16,"icon-ldmt.gif",16,16];
awmCreateCSS(0,1,0,n,n,n,n,n,'none','0','#000000',0,0);
awmCreateCSS(1,2,1,'#FFFFFF',n,3,'11px Tahoma',n,'none','0','#000000','0px 15px 0px 25',1);
awmCreateCSS(0,2,1,'#FFFFFF',n,4,'11px Tahoma',n,'none','0','#000000','0px 15px 0px 25',1);
awmCreateCSS(0,1,0,n,n,n,n,n,'solid','1','#808080',0,0);
awmCreateCSS(1,2,0,'#000000',n,9,'11px Tahoma',n,'none','0','#000000','0px 10px 0px 7',1);
awmCreateCSS(0,2,0,'#000000',n,10,'11px Tahoma',n,'none','0','#000000','0px 10px 0px 7',1);
awmCreateCSS(1,2,0,'#000000',n,15,'11px Tahoma',n,'none','0','#000000','0px 0px 0px 0',1);
awmCreateCSS(0,2,0,'#000000',n,15,'11px Tahoma',n,'none','0','#000000','0px 0px 0px 0',1);
awmCreateCSS(1,2,0,n,n,n,n,n,'none',0,'#000000','0px 0px 0px 0',0);
awmCreateCSS(0,2,0,n,n,n,n,n,'none',0,'#000000','0px 0px 0px 0',0);
awmCreateCSS(1,2,0,'#000000',n,9,'11px Tahoma',n,'none','0','#000000','0px 10px 0px 35',1);
awmCreateCSS(0,2,0,'#000000',n,10,'11px Tahoma',n,'none','0','#000000','0px 10px 0px 35',1);
var s0=awmCreateMenu(0,0,0,0,1,0,0,0,0,0,0,0,1,0,0,0,1,n,n,100,1,0,10,0,770,-1,1,0,200,0,0,0,"0,0,0");
it=s0.addItemWithImages(1,2,2,"Home",n,n,"",n,n,n,3,3,3,n,n,n,"",n,n,n,<?php echo $_SESSION['directory_name']?>,n,0,0,2,n,5,5,n,6,6,0,1,1,0,0,n,n,n);
//it=s0.addItemWithImages(1,2,2,"Links",n,n,"",n,n,n,3,3,3,2,2,2,"",n,n,n,n,n,0,0,2,n,5,5,n,6,6,0,1,1,0,0,n,n,n);
//var s1=it.addSubmenu(0,0,-1,1,3,0,0,3,0,1,0,n,n,100,0,3,0,-1,1,0,100,1,3,"0,0,0");
//it=s1.addItemWithImages(4,5,5,"Email",n,n,"",7,7,7,3,3,3,n,n,n,"",n,n,n,"http://www.likno.com?a_aid=ed62205a","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s1.addItemWithImages(6,7,7,"","","","",16,16,16,3,3,3,n,n,n,"",n,n,n,n,n,0,2,2,n,n,n,n,n,n,0,0,0,0,0,n,n,n);
//it=s1.addItemWithImages(4,5,5," &nbsp; &nbsp;WebAssist Extensions &nbsp;",n,n,"",17,17,17,3,3,3,8,8,8,"",n,n,n,n,n,0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//var s2=it.addSubmenu(0,0,-1,1,1,0,0,3,0,1,0,n,n,100,0,4,0,-1,1,0,200,0,0,"0,0,0");
//it=s2.addItemWithImages(4,5,5," &nbsp; &nbsp;Super Suite"," &nbsp; &nbsp;Click for more info"," &nbsp; &nbsp;Click for more info","",17,17,17,3,3,3,8,8,8,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=110&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//var s3=it.addSubmenu(0,0,-1,1,5,0,0,3,0,1,0,n,n,100,0,6,0,-1,1,100,200,0,0,"0,0,0");
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;CSS Menu Writer",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=146&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;CSS Sculptor",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=135&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;eCart Shopping Cart",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=123&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;iRite WYSIWYG Editor",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=141&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Pro Maps for Google",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=140&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Universal Email",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=134&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;DataAssist",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=117&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;SecurityAssist",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=114&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Cookies Toolkit",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=109&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Validation Toolkit",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=33&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Dynamic Dropdowns",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=1&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;SiteScribe",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=145&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Site Import",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=142&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Digital File Pro",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=112&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s2.addItemWithImages(4,5,5," &nbsp; &nbsp;eCommerce Suite"," &nbsp; &nbsp;Click for more info"," &nbsp; &nbsp;Click for more info","",17,17,17,3,3,3,8,8,8,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=138&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//var s3=it.addSubmenu(0,0,-1,1,5,0,0,3,0,1,0,n,n,100,0,7,0,-1,1,100,200,0,0,"0,0,0");
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;eCart Shopping Cart",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=123&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Universal Email",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=134&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;DataAssist",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=117&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Cookies Toolkit",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=109&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Validation Toolkit",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=33&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Digital File Pro",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=112&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s2.addItemWithImages(4,5,5," &nbsp; &nbsp;Web Developer Suite &nbsp;"," &nbsp; &nbsp;Click for more info"," &nbsp; &nbsp;Click for more info","",17,17,17,3,3,3,8,8,8,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=131&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//var s3=it.addSubmenu(0,0,-1,1,5,0,0,3,0,1,0,n,n,100,0,8,0,-1,1,100,200,0,0,"0,0,0");
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;iRite WYSIWYG Editor",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=141&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Pro Maps for Google",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=140&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Universal Email",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=134&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;DataAssist",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=117&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;SecurityAssist",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=114&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Cookies Toolkit",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=109&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Validation Toolkit",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=33&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Dynamic Dropdowns",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=1&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Digital File Pro",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=112&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s2.addItemWithImages(4,5,5," &nbsp; &nbsp;Web Designer Suite"," &nbsp; &nbsp;Click for more info"," &nbsp; &nbsp;Click for more info","",17,17,17,3,3,3,8,8,8,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=125&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//var s3=it.addSubmenu(0,0,-1,1,5,0,0,3,0,1,0,n,n,100,0,9,0,-1,1,100,200,0,0,"0,0,0");
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;CSS Menu Writer",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=146&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;CSS Sculptor",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=135&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Pro Maps for Google",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=140&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Cookies Toolkit",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=109&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;SiteScribe",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=145&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Site Import",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=142&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;SiteAssist",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=113&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s2.addItemWithImages(4,5,5," &nbsp; &nbsp;Admin Suite"," &nbsp; &nbsp;Click for more info"," &nbsp; &nbsp;Click for more info","",17,17,17,3,3,3,8,8,8,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=139&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//var s3=it.addSubmenu(0,0,-1,1,5,0,0,3,0,1,0,n,n,100,0,10,0,-1,1,100,200,0,0,"0,0,0");
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;iRite WYSIWYG Editor",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=141&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;DataAssist",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=117&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;SecurityAssist",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=114&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;Digital File Pro",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=112&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s3.addItemWithImages(4,5,5," &nbsp; &nbsp;SiteAssist",n,n,"",17,17,17,3,3,3,n,n,n,"",n,n,n,"http://www.webassist.com/professional/products/productdetails.asp?PID=113&WAAID=649","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s1.addItemWithImages(6,7,7,"","","","",16,16,16,3,3,3,n,n,n,"",n,n,n,n,n,0,2,2,n,n,n,n,n,n,0,0,0,0,0,n,n,n);
//it=s1.addItemWithImages(4,5,5," &nbsp; &nbsp;Trio Solutions",n,n,"",18,18,18,3,3,3,n,n,n,"",n,n,n,"http://components.developers4web.com/?acode=18209","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s1.addItemWithImages(6,7,7,"","","","",16,16,16,3,3,3,n,n,n,"",n,n,n,n,n,0,2,2,n,n,n,n,n,n,0,0,0,0,0,n,n,n);
//it=s1.addItemWithImages(4,5,5," &nbsp; &nbsp;Top Dreamweaver",n,n,"",19,19,19,3,3,3,n,n,n,"",n,n,n,"http://www.topdreamweaverextensions.com/?acode=18034","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s1.addItemWithImages(6,7,7,"","","","",16,16,16,3,3,3,n,n,n,"",n,n,n,n,n,0,2,2,n,n,n,n,n,n,0,0,0,0,0,n,n,n);
//it=s1.addItemWithImages(4,5,5," &nbsp; &nbsp;Hot Dreamweaver",n,n,"",20,20,20,3,3,3,n,n,n,"",n,n,n,"http://www.hotdreamweaver.com/?acode=18223","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s0.addItemWithImages(1,2,2,"About this Menu",n,n,"",n,n,n,3,3,3,2,2,2,"",n,n,n,"http://www.justdreamweaver.com/dreamweaver-templates.html",n,0,0,2,n,5,5,n,6,6,0,1,1,0,0,n,n,n);
//var s1=it.addSubmenu(0,0,-1,1,3,0,0,3,0,1,0,n,n,100,0,17,0,-1,1,0,100,1,3,"0,0,0");
//it=s1.addItem(8,9,9,"<div style=\"background-color:#ECECEC; padding:7px; font-family: Arial, Helvetica, sans-serif; font-size:11px;\">Create a menu just like this with <br /><strong><a href=\"http://www.likno.com?a_aid=ed62205a\" target=\"_blank\">AllWebMenus Pro</a></strong>! Simple to<br /> style and full control over all<br /> menu properties.<br /><br />Even include <strong>full HTML</strong> in your <br />menus, just like you see here!<br /><br /><a href=\"http://www.likno.com?a_aid=ed62205a\"><img src=\"http://www.justdreamweaver.com/images/awmpro.jpg\" style=\"border:none; padding-left:5px;\"/></a></div>",n,n,"","",n,n,n,n,n,0,0,2,0,2);
//it=s0.addItemWithImages(1,2,2,"More Likno Products",n,n,"",n,n,n,3,3,3,2,2,2,"",n,n,n,n,n,0,0,2,n,5,5,n,6,6,0,1,1,0,0,n,n,n);
//var s1=it.addSubmenu(0,0,-1,1,3,0,0,3,0,1,0,n,n,100,0,1,0,-1,1,0,200,1,3,"0,0,0");
//it=s1.addItemWithImages(4,5,5," &nbsp; &nbsp;AllWebMenus Pro",n,n,"",7,7,7,3,3,3,n,n,n,"",n,n,n,"http://www.likno.com?a_aid=ed62205a","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s1.addItemWithImages(4,5,5," &nbsp; &nbsp;AllWebMenus Lite",n,n,"",21,21,21,3,3,3,n,n,n,"http://www.likno.com?a_aid=ed62205a",n,n,n,"http://www.likno.com?a_aid=ed62205a","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s1.addItemWithImages(4,5,5," &nbsp; &nbsp;Likno Web Button Maker",n,n,"",22,22,22,3,3,3,n,n,n,"",n,n,n,"http://www.likno.com/web-button-maker?a_aid=ed62205a","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s1.addItemWithImages(4,5,5," &nbsp; &nbsp;Photo Frame Show",n,n,"",23,23,23,3,3,3,8,8,8,"",n,n,n,"http://www.frameshow.com?a_aid=ed62205a","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
////var s2=it.addSubmenu(0,0,-1,1,1,0,0,3,0,1,0,n,n,100,-1,2,0,-1,1,0,200,0,0,"0,0,0");
//it=s2.addItemWithImages(10,11,11,"Description",n,n,"",n,n,n,3,3,3,n,n,n,"http://www.frameshow.com?a_aid=ed62205a",n,n,n,"http://www.frameshow.com?a_aid=ed62205a","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s2.addItemWithImages(6,7,7,"","","","",16,16,16,3,3,3,n,n,n,"",n,n,n,n,n,0,2,2,n,n,n,n,n,n,0,0,0,0,0,n,n,n);
//it=s2.addItemWithImages(4,5,5," &nbsp; &nbsp;Download",n,n,"",24,24,24,3,3,3,n,n,n,"http://www.frameshow.com?a_aid=ed62205a",n,n,n,"http://www.frameshow.com?a_aid=ed62205a","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s2.addItemWithImages(4,5,5," &nbsp; &nbsp;Help",n,n,"",25,25,25,3,3,3,n,n,n,"http://www.frameshow.com?a_aid=ed62205a",n,n,n,"http://www.frameshow.com?a_aid=ed62205a","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s1.addItemWithImages(4,5,5," &nbsp; &nbsp;Likno Drop Down Menu Trees",n,n,"",26,26,26,3,3,3,n,n,n,"http://www.likno.com/drop-down-menu-trees?a_aid=ed62205a",n,n,n,"http://www.likno.com/drop-down-menu-trees?a_aid=ed62205a","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);
//it=s1.addItemWithImages(6,7,7,"","","","",16,16,16,3,3,3,n,n,n,"",n,n,n,n,n,0,2,2,n,n,n,n,n,n,0,0,0,0,0,n,n,n);
//it=s1.addItemWithImages(10,11,11,"DHTML Menu Templates",n,n,"",n,n,n,3,3,3,n,n,n,"http://www.likno.com/menu-templates/gallery.php?a_aid=ed62205a",n,n,n,"http://www.likno.com/menu-templates/gallery.php?a_aid=ed62205a","new",0,0,2,11,12,12,13,14,14,1,1,1,0,0,n,n,n);

//it=s0.addItemWithImages(1,2,2,"Contact",n,n,"",n,n,n,3,3,3,n,n,n,"",n,n,n,n,n,0,0,2,n,5,5,n,6,6,0,1,1,0,0,n,n,n);
//it=s0.addItemWithImages(1,2,2,"About Us",n,n,"",n,n,n,3,3,3,n,n,n,"",n,n,n,n,n,0,0,2,n,5,5,n,6,6,0,1,1,0,0,n,n,n);
s0.pm.buildMenu();
}}
