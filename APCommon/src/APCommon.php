<?php
   namespace APCommon;
   /**
    * A class with common and advance functionality to make custom development faster ;)
    *
    * @package APCommon
    * @author S.M.A Sayem Prodhan Ananta
    * @version 0.0.3
    **/
   class APCommon
   {
         private $ago=' ago.';
         function time_ago($time="",$atf=false)
         {
               /*
               * $time must be in 2016-11-28T18:12:29+01:00 or 2016-11-28 or a standard date/time format
               */
               $ago=$this->ago;
               $in=strtotime($time);
               $now=time();
               if($in>=$now)
               {
                     trigger_error('The supplied time is greater than current time.');
               }
               $out=$now-$in;
               $_out=$out/3600;
               if(($_out/24)>=365)
               {
                     $retval = round(($_out/24)/365);
                     $retval .= ($_out/24)/365>1?" years":" year";
                     $retval .= $atf?$ago:'.';
                     return $retval;
               }
               else if($_out>=24)
               {
                     $retval = round($_out/24);
                     $retval .= $_out/24>1?" days":" day";
                     $retval .= $atf?$ago:'.';
                     return $retval;
               }
               else if($out>3600)
               {
                     $retval = round($out/3600);
                     $retval .= $out/3600>1?" hours":" hour";
                     $retval .= $atf?$ago:'.';
                     return $retval;
               }
               else if($out>60)
               {
                     $retval = round($out/60);
                     if(preg_match('/-/i',$retval))
                     {
                           return str_replace('-','',$retval);
                     }
                     $retval .= $out/24>1?" minutes":" minute";
                     $retval .= $atf?$ago:'.';
                     return $retval;
               }
               else if($out<60)
               {
                     $retval = "Just now.";
                     return $retval;
               }
         }//end time_ago()
         /**
          * xss cleaner function
          *
          * @return string
          **/
         function xss_clean($arg,$tf=true,$charset='UTF-8')
         {
               if($tf==false)
               {
                     $data=preg_replace('/<script>.*<\/script>/i','',$arg);
               }else{
                     $data=htmlspecialchars(htmlentities(preg_replace('/<script>.*<\/script>/i','',$arg),ENT_QUOTES|ENT_DISALLOWED,$charset));
               }
               return ($data);
         }//end xss_clean()
         function truncate($input,$retlength,$wl='w')
         {
			 $retval='';
			 $i=null;
			 if(strtolower($wl)=='w')
			 {
				 if(str_word_count($input,0)>$retlength)
				 {
					 for($i=0;$i<=$retlength;$i++):
					 $retval .=' '.str_word_count($input,1)[$i];				 
					 endfor;
				 }
			 }
			 else if(strtolower($wl)=='l')
			 {
				 if(strlen($input)>$retlength)
				 {
					 $retval=substr($input,0,$retlength);
				 }
			 }
			 else
			 {
				 trigger_error("{$wl} must be either 'l' or 'w'");
			 }
			 return $retval." ...";
		 }//end truncate()   
   } // END class APCommon
   
 
   
?>
