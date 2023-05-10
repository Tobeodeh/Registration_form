
/*form{
    
    background-color:#000080 ;
    width: 50%;
    display: block;
    margin-left: 25%;
    margin-right: auto;
    border: 2px solid #B8860D;
    border-radius: 10px;
    padding: 20px;
    justify-content: center;
} */

body{
   display: flex;
   justify-content: center;
   background-color: #585858;
   
}

.form-properties{
   width: 100%;
   max-width: 550px;
   /* border: 2px solid #C0C0C0 ; */
   border-radius: 15px;
   overflow:hidden;
}

.img-container{
   background-color:#020247 ;
   
   padding: 0.9rem;
}

.img-style{
    display: block;
    margin: 0 auto;
    width: 100%;
    height: 100%;
}

form {
    display: block;
    direction: column;
    /* flex-direction: column; */
    justify-content: center;
    padding: 2rem;
    background-color: white;
 }
 .form-header {
    margin: 1rem auto 2rem;
    border-radius: 50%;
    width: 150px;
    height: 150px;
    overflow: hidden;
    border: 2px solid  #C0C0C0; 
 }
 
 label {
    font-weight: bolder;
    font-family: 'Courier New', Courier, monospace;
    /* font-style: oblique; */
    font-size: 17px;
    margin: 10px 0;
    color: #333333;
    padding: 5px;
    
 }
 input, select, textarea {
    margin: 10px 0;
    padding: 5px;
    border-radius: 10px;
    border: 1px solid #C0C0C0;
    font-size: 16px;
    line-height: 30px;
 }
 select{
   font: 1em courier;
   font-size: 17px;
   font-weight: bolder;
   color: #C0C0C0;
 }
 input[type="radio"] {
    margin: 10px;
    display: inline-block;
    font-weight: normal;
    border:1px solid #C0C0C0; 
    

    
 }
 /* .radio-cont{
   display: flex;
   flex-direction: column;
 }

 .radio-cont label {
   display: inline-block;
 } */

 .form-style{
   /* border: 1px solid white; */
   display: grid;
   grid-template-columns: 1fr 2fr;
   position: relative;
   
 }
 
 
 textarea {
    border-radius: 10px;
    border: 1px solid #C0C0C0;
    font-size: 16px;
    resize: none;
    font: 1em courier;
    font-weight: lighter;
    color: #C0C0C0;
 }
 .textarea-label {
    /* position: absolute;
    top: 10px;
    left: 10px; */
    font-size: 14px;
    color: #A9A9A9;
 }

 .submit-btn{
   padding: 10px;
   margin-top:10px;
   width: 100%;
   color:white ;
   background-color: #020247;
   border: 2px solid #C0C0C0;
   border-radius:10px ;
}

 .button-style{
   display: flex;
   max-width: 500px;
 }
 h1{
   text-align: center;
   font-family: 'Courier New', Courier, monospace;
   color: #C0C0C0;
   font-weight: bolder;
 }
 input[type="submit"]{
   font-family: 'Courier New', Courier, monospace;
   font-weight: bolder;
   font-size: 20px;
   color: #C0C0C0;
 }


 .form-style:focus {
   outline: 0;
}

/* .properties small{
   position: relative;
   bottom: o;
   left: 0;
}*/
/* .form-style.success input {
  border-color: green;
}

.form-style.error input {
   border-color:#ff3860 ;
   
} */

/* .form-style .error input {
   border-color:#ff3860 ;
   font-size: 9px;
   height:0px ;
   
} */

/* .form-style .error {
   font-size: 12px;
   height:auto ;
   position: absolute;
   left:200px ;
   color: #ff3860;
   top: auto;
} */

input{
   width: 100%;
}

.error input {
   border : 2px solid #a4133c;
 }
 
 .success input {
   border : 2px solid green;
 }
 
 
small{
   display: block;
   visibility: hidden;
   font-size: 10px;
}
 
 /* .form-style small {
   position: absolute;
   bottom: -1.2rem;
   left: 0;
   visibility: hidden;
 }
  */
 .error small {
 
   visibility: visible;
   color: #a4133c;
 }
 