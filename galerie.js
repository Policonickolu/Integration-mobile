// GALERIE D'IMAGES
                    
    var interval ="";
    
    var timer1 = "";
    var timer2 = "";
    var timer3 = "";
    
    var image = 0;
    var stop = 0;
    
    $(document).ready(function() {
            $('#images').scrollTo( 'li:eq(0)', 0 );
            changer();
            interval = setInterval("changer()",15000);		
    });
    
    function setIntval(){
            clearInterval(interval);
            changer();
            interval = setInterval("changer()",15000);				
    }
    
    function clearIntval(){
            stop = image;
            clearInterval(interval);
            clearTimeout(timer1);
            clearTimeout(timer2);
            clearTimeout(timer3);
    }
    
    function changer1(){
            $('#images').scrollTo( 'li:eq(0)', 500 );
            image = 1;
            $('#puce1').css({background : 'url("images/pointplein.png") top left no-repeat'});
            $('#puce2').css({background : 'url("images/pointvide.png") top left no-repeat'});
            $('#puce3').css({background : 'url("images/pointvide.png") top left no-repeat'});
    }
    
    function changer2(){
            $('#images').scrollTo( 'li:eq(1)', 500 );
            image = 2;
            $('#puce2').css({background : 'url("images/pointplein.png") top left no-repeat'});
            $('#puce1').css({background : 'url("images/pointvide.png") top left no-repeat'});
            $('#puce3').css({background : 'url("images/pointvide.png") top left no-repeat'});
    }
    
    function changer3(){
            $('#images').scrollTo( 'li:eq(2)', 500 );
            image = 3;
            $('#puce3').css({background : 'url("images/pointplein.png") top left no-repeat'});
            $('#puce1').css({background : 'url("images/pointvide.png") top left no-repeat'});
            $('#puce2').css({background : 'url("images/pointvide.png") top left no-repeat'});
    }			
    
    function changer(){				
            if(stop < 1) timer1 = setTimeout("changer1()", (1-stop)*5000);
            if(stop < 2) timer2 = setTimeout("changer2()", (2-stop)*5000);
            if(stop < 3) timer3 = setTimeout("changer3()", (3-stop)*5000);
            stop = 0;
    }