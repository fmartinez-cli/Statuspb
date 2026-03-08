var v = jQuery.noConflict();
v(document).ready(function(){
  v('#open').click(function(){
        v('#popup').fadeIn('slow');
        v('.popup-overlay').fadeIn('slow');
        v('.popup-overlay').height(v(window).height());
        return false;
    });
  v('#open1').click(function(){
  v('#popup1').fadeIn('slow');
  return false;
  });
    v('#open2').click(function(){
  v('#popup2').fadeIn('slow');
  return false;
  });
	v('#open3').click(function(){
  v('#popup3').fadeIn('slow');
  return false;
  });
	v('#open4').click(function(){
	v('#popup4').fadeIn('slow');
	return false;
	});
	v('#open5').click(function(){
	v('#popup5').fadeIn('slow');
	return false;
	});
	v('#open6').click(function(){
	v('#popup6').fadeIn('slow');
	return false;
	});
	v('#open7').click(function(){
	v('#popup7').fadeIn('slow');
	return false;
	});
	v('#open8').click(function(){
	v('#popup8').fadeIn('slow');
	return false;
	});
	v('#open9').click(function(){
	v('#popup9').fadeIn('slow');
	return false;
	});
	v('#open10').click(function(){
	v('#popup10').fadeIn('slow');
	return false;
	});
	v('#open11').click(function(){
	v('#popup11').fadeIn('slow');
	return false;
	});
	v('#open12').click(function(){
	v('#popup12').fadeIn('slow');
	return false;
	});
	v('#open13').click(function(){
	v('#popup13').fadeIn('slow');
	return false;
	});
	v('#open14').click(function(){
	v('#popup14').fadeIn('slow');
	return false;
	});
	v('#open15').click(function(){
	v('#popup15').fadeIn('slow');
	return false;
	});
	v('#open16').click(function(){
	v('#popup16').fadeIn('slow');
	return false;
	});
    v('#close').click(function(){
        v('#popup').fadeOut('slow');
        v('.popup-overlay').fadeOut('slow');
        return false;
    });

    v(document).keyup(function(event){
        if(event.which==27){
        v('#popup').fadeOut('slow');
        v('.popup-overlay').fadeOut('slow');
        return false;
        }
    });
});