@extends('layouts.master1')
@section('title', 'My Jobs - rbs')
@section('header')
  @include('providerheader')
@endsection
@section('body')
<div class="selection" style="margin-bottom:100px;">
<div class="container selectfree">
  <div class="card sfree">
    <div class="row">
      <div class="col-md-10">
      <div class="input-group">
      <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
      <input type="text" name="search" class="form-control" placeholder="search">
      </div>
      </div>
      <div class="col-md-2">
      <button class="empbut" type="submit" value="submit"> Search</button>
      <div class="pull-right drpicon">
      <span><h class="viewjus">View</h></span>
      <span class="dropdown">
          <button class="btn btn-default dropdown-toggle dropview" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <span class="glyphicon glyphicon-align-justify jus" aria-hidden="true"></span>
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a id="compt" href="#">Compact</a></li>
            <li><a id="exp" href="#">Expand</a></li>
          </ul>
        </span>
        </div>
        </div>
        </div>
      </div>
      <div id="1" class="com1">
     <div id="compact" class="card lancers short">
      <div class="row">
          <div class="col-md-1 lanpic">
            <img src="/images/tech2.jpg" width="60" height="60" class="img-circle">
          </div>
          <div class="col-md-8">
            <a  class="lancera" href="#">Vishweswaran R.</a><br>
            <p class="lancera">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
            <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
            <h class="about">Concept artist and illustrator living in India participated over variety of stylist ....</h>
          </div>
          <div class="col-md-3">
            <button class="profsetbut pull-right" type="button"> Invite to Job</button>
          </div>
       </div>
      <hr class="hr-end">
      </div>


       <div id="compact" class="card lancers1 short">
      <div class="row">
          <div class="col-md-1 lanpic">
            <img src="/images/tech2.jpg" width="60" height="60" class="img-circle">
          </div>
          <div class="col-md-8">
            <a  class="lancera" href="#">Vishweswaran R.</a><br>
            <p class="lancera">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
            <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
            <h class="about">Concept artist and illustrator living in India participated over variety of stylist ....</h>
          </div>
          <div class="col-md-3">
            <button class="profsetbut pull-right" type="button"> Invite to Job</button>
          </div>
       </div>
       <hr class="hr-end">
      </div>


      <div id="compact" class="card lancers1 short">
      <div class="row">
          <div class="col-md-1 lanpic">
            <img src="/images/tech2.jpg" width="60" height="60" class="img-circle">
          </div>
          <div class="col-md-8">
            <a  class="lancera" href="#">Vishweswaran R.</a><br>
            <p class="lancera">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
            <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
            <h class="about">Concept artist and illustrator living in India participated over variety of stylist ....</h>
          </div>
          <div class="col-md-3">
            <button class="profsetbut pull-right" type="button"> Invite to Job</button>
          </div>
       </div>
       <hr class="hr-end">
      </div>


      <div id="compact" class="card lancers1 short">
      <div class="row">
          <div class="col-md-1 lanpic">
            <img src="/images/tech2.jpg" width="60" height="60" class="img-circle">
          </div>
          <div class="col-md-8">
            <a  class="lancera" href="#">Vishweswaran R.</a><br>
            <p class="lancera">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
            <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
            <h class="about">Concept artist and illustrator living in India participated over variety of stylist ....</h>
          </div>
          <div class="col-md-3">
            <button class="profsetbut pull-right" type="button"> Invite to Job</button>
          </div>
       </div>
       <hr class="hr-end">
      </div>


      <div id="compact" class="card lancers1 short">
      <div class="row">
          <div class="col-md-1 lanpic">
            <img src="/images/tech2.jpg" width="60" height="60" class="img-circle">
          </div>
          <div class="col-md-8">
            <a  class="lancera" href="#">Vishweswaran R.</a><br>
            <p class="lancera">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
            <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
            <h class="about">Concept artist and illustrator living in India participated over variety of stylist ....</h>
          </div>
          <div class="col-md-3">
            <button class="profsetbut pull-right" type="button"> Invite to Job</button>
          </div>
       </div>
       <hr class="hr-end">
      </div>


      <div id="compact" class="card lancers1 short">
      <div class="row">
          <div class="col-md-1 lanpic">
            <img src="/images/tech2.jpg" width="60" height="60" class="img-circle">
          </div>
          <div class="col-md-8">
            <a  class="lancera" href="#">Vishweswaran R.</a><br>
            <p class="lancera">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
            <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
            <h class="about">Concept artist and illustrator living in India participated over variety of stylist ....</h>
          </div>
          <div class="col-md-3">
            <button class="profsetbut pull-right" type="button"> Invite to Job</button>
          </div>
       </div>
       <hr class="hr-end">
      </div>


      <div id="compact" class="card lancers1 short">
      <div class="row">
          <div class="col-md-1 lanpic">
            <img src="/images/tech2.jpg" width="60" height="60" class="img-circle">
          </div>
          <div class="col-md-8">
            <a  class="lancera" href="#">Vishweswaran R.</a><br>
            <p class="lancera">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
            <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
            <h class="about">Concept artist and illustrator living in India participated over variety of stylist ....</h>
          </div>
          <div class="col-md-3">
            <button class="profsetbut pull-right" type="button"> Invite to Job</button>
          </div>
       </div>
       <hr class="hr-end">
      </div>


      <div id="compact" class="card lancers1 short">
      <div class="row">
          <div class="col-md-1 lanpic">
            <img src="/images/tech2.jpg" width="60" height="60" class="img-circle">
          </div>
          <div class="col-md-8">
            <a  class="lancera" href="#">Vishweswaran R.</a><br>
            <p class="lancera">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
            <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
            <h class="about">Concept artist and illustrator living in India participated over variety of stylist ....</h>
          </div>
          <div class="col-md-3">
            <button class="profsetbut pull-right" type="button"> Invite to Job</button>
          </div>
       </div>
       <hr class="hr-end">
      </div>


      <div id="compact" class="card lancers1 short">
      <div class="row">
          <div class="col-md-1 lanpic">
            <img src="/images/tech2.jpg" width="60" height="60" class="img-circle">
          </div>
          <div class="col-md-8">
            <a  class="lancera" href="#">Vishweswaran R.</a><br>
            <p class="lancera">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
            <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
            <h class="about">Concept artist and illustrator living in India participated over variety of stylist ....</h>
          </div>
          <div class="col-md-3">
            <button class="profsetbut pull-right" type="button"> Invite to Job</button>
          </div>
       </div>
       <hr class="hr-end">
      </div>


      <div id="compact" class="card lancers1 short">
      <div class="row">
          <div class="col-md-1 lanpic">
            <img src="/images/tech2.jpg" width="60" height="60" class="img-circle">
          </div>
          <div class="col-md-8">
            <a  class="lancera" href="#">Vishweswaran R.</a><br>
            <p class="lancera">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
            <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
            <h class="about">Concept artist and illustrator living in India participated over variety of stylist ....</h>
          </div>
          <div class="col-md-3">
            <button class="profsetbut pull-right" type="button"> Invite to Job</button>
          </div>
       </div>
       <hr class="hr-end">
        <a  href="#"><h class="help">Help rbs improve your search experience.</h></a>
        <div class="pull-right">
        <button class="empbut1" type="button" disabled > Previous</button>
        <a  class="pageno" href="#">1</a>
        <a class="pageno" href="#">2</a>
        <a class="pageno" href="#">3</a>
        <a class="pageno" href="#">4</a>
        <a class="pageno" href="#">5</a>
        <button class="empbut1" type="button" value="submit"> Next</button>
        </div>
      </div>
      </div>


      <div id="2" class="ex2">
      <div id="expand" class="card lancersexpand large">
      <div class="row">
          <div class="col-md-2 lanpic">
            <img src="/images/tech2.jpg" width="100" height="100" class="img-circle">
          </div>
          <div class="col-md-9">
                  <a  class="lanceraex" href="#">Vishweswaran R.</a><br>
                  <p class="qualify">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
                  <div class="row">
                      <div class="col-md-2">
                        <span ><p>$5.56 / hr</p></span>
                      </div>
                      <div class="col-md-3">
                      <p>$2k+ earned </p>
                      </div>
                      <div class="col-md-6">
                      <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
                      </div>
                  </div>
                  <h class="aboutex">Concept artist and illustrator living in India participated over variety of stylist Concept artist and illustrator Concept artist and illustrator living in India participated over variety of stylist ....</h><br>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <a class="lanceraex" href="#">6 more</a>
                 <div class="testex">
                 <h >Tests:<a href="#">7</a></h>
                 </div>
              </div>
           </div>
          <hr class="hr-end">
          </div>



      <div id="expand" class="card lancersexpand1 large">
      <div class="row">
          <div class="col-md-2 lanpic">
            <img src="/images/tech2.jpg" width="100" height="100" class="img-circle">
          </div>
          <div class="col-md-9">
                  <a  class="lanceraex" href="#">Vishweswaran R.</a><br>
                  <p class="qualify">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
                  <div class="row">
                      <div class="col-md-2">
                        <span ><p>$5.56 / hr</p></span>
                      </div>
                      <div class="col-md-3">
                      <p>$2k+ earned </p>
                      </div>
                      <div class="col-md-6">
                      <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
                      </div>
                  </div>
                  <h class="aboutex">Concept artist and illustrator living in India participated over variety of stylist Concept artist and illustrator Concept artist and illustrator living in India participated over variety of stylist ....</h><br>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <a class="lanceraex" href="#">6 more</a>
                 <div class="testex">
                 <h >Tests:<a href="#">7</a></h>
                 </div>
              </div>

           </div>
          <hr class="hr-end">
          </div>



      <div id="expand" class="card lancersexpand1 large">
      <div class="row">
          <div class="col-md-2 lanpic">
            <img src="/images/tech2.jpg" width="100" height="100" class="img-circle">
          </div>
          <div class="col-md-9">
                  <a  class="lanceraex" href="#">Vishweswaran R.</a><br>
                  <p class="qualify">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
                  <div class="row">
                      <div class="col-md-2">
                        <span ><p>$5.56 / hr</p></span>
                      </div>
                      <div class="col-md-3">
                      <p>$2k+ earned </p>
                      </div>
                      <div class="col-md-6">
                      <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
                      </div>
                  </div>
                  <h class="aboutex">Concept artist and illustrator living in India participated over variety of stylist Concept artist and illustrator Concept artist and illustrator living in India participated over variety of stylist ....</h><br>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <a class="lanceraex" href="#">6 more</a>
                 <div class="testex">
                 <h >Tests:<a href="#">7</a></h>
                 </div>
              </div>

           </div>
          <hr class="hr-end">
          </div>



      <div id="expand" class="card lancersexpand1 large">
      <div class="row">
          <div class="col-md-2 lanpic">
            <img src="/images/tech2.jpg" width="100" height="100" class="img-circle">
          </div>
          <div class="col-md-9">
                  <a  class="lanceraex" href="#">Vishweswaran R.</a><br>
                  <p class="qualify">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
                  <div class="row">
                      <div class="col-md-2">
                        <span ><p>$5.56 / hr</p></span>
                      </div>
                      <div class="col-md-3">
                      <p>$2k+ earned </p>
                      </div>
                      <div class="col-md-6">
                      <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
                      </div>
                  </div>
                  <h class="aboutex">Concept artist and illustrator living in India participated over variety of stylist Concept artist and illustrator Concept artist and illustrator living in India participated over variety of stylist ....</h><br>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <a class="lanceraex" href="#">6 more</a>
                 <div class="testex">
                 <h >Tests:<a href="#">7</a></h>
                 </div>
              </div>

           </div>
          <hr class="hr-end">
          </div>



      <div id="expand" class="card lancersexpand1 large">
      <div class="row">
          <div class="col-md-2 lanpic">
            <img src="/images/tech2.jpg" width="100" height="100" class="img-circle">
          </div>
          <div class="col-md-9">
                  <a  class="lanceraex" href="#">Vishweswaran R.</a><br>
                  <p class="qualify">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
                  <div class="row">
                      <div class="col-md-2">
                        <span ><p>$5.56 / hr</p></span>
                      </div>
                      <div class="col-md-3">
                      <p>$2k+ earned </p>
                      </div>
                      <div class="col-md-6">
                      <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
                      </div>
                  </div>
                  <h class="aboutex">Concept artist and illustrator living in India participated over variety of stylist Concept artist and illustrator Concept artist and illustrator living in India participated over variety of stylist ....</h><br>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <a class="lanceraex" href="#">6 more</a>
                 <div class="testex">
                 <h >Tests:<a href="#">7</a></h>
                 </div>
              </div>

           </div>
          <hr class="hr-end">
          </div>



      <div id="expand" class="card lancersexpand1 large">
      <div class="row">
          <div class="col-md-2 lanpic">
            <img src="/images/tech2.jpg" width="100" height="100" class="img-circle">
          </div>
          <div class="col-md-9">
                  <a  class="lanceraex" href="#">Vishweswaran R.</a><br>
                  <p class="qualify">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
                  <div class="row">
                      <div class="col-md-2">
                        <span ><p>$5.56 / hr</p></span>
                      </div>
                      <div class="col-md-3">
                      <p>$2k+ earned </p>
                      </div>
                      <div class="col-md-6">
                      <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
                      </div>
                  </div>
                  <h class="aboutex">Concept artist and illustrator living in India participated over variety of stylist Concept artist and illustrator Concept artist and illustrator living in India participated over variety of stylist ....</h><br>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <a class="lanceraex" href="#">6 more</a>
                 <div class="testex">
                 <h >Tests:<a href="#">7</a></h>
                 </div>
              </div>

           </div>
          <hr class="hr-end">
          </div>



      <div id="expand" class="card lancersexpand1 large">
      <div class="row">
          <div class="col-md-2 lanpic">
            <img src="/images/tech2.jpg" width="100" height="100" class="img-circle">
          </div>
          <div class="col-md-9">
                  <a  class="lanceraex" href="#">Vishweswaran R.</a><br>
                  <p class="qualify">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
                  <div class="row">
                      <div class="col-md-2">
                        <span ><p>$5.56 / hr</p></span>
                      </div>
                      <div class="col-md-3">
                      <p>$2k+ earned </p>
                      </div>
                      <div class="col-md-6">
                      <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
                      </div>
                  </div>
                  <h class="aboutex">Concept artist and illustrator living in India participated over variety of stylist Concept artist and illustrator Concept artist and illustrator living in India participated over variety of stylist ....</h><br>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <a class="lanceraex" href="#">6 more</a>
                 <div class="testex">
                 <h >Tests:<a href="#">7</a></h>
                 </div>
              </div>

           </div>
          <hr class="hr-end">
          </div>



      <div id="expand" class="card lancersexpand1 large">
      <div class="row">
          <div class="col-md-2 lanpic">
            <img src="/images/tech2.jpg" width="100" height="100" class="img-circle">
          </div>
          <div class="col-md-9">
                  <a  class="lanceraex" href="#">Vishweswaran R.</a><br>
                  <p class="qualify">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
                  <div class="row">
                      <div class="col-md-2">
                        <span ><p>$5.56 / hr</p></span>
                      </div>
                      <div class="col-md-3">
                      <p>$2k+ earned </p>
                      </div>
                      <div class="col-md-6">
                      <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
                      </div>
                  </div>
                  <h class="aboutex">Concept artist and illustrator living in India participated over variety of stylist Concept artist and illustrator Concept artist and illustrator living in India participated over variety of stylist ....</h><br>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <a class="lanceraex" href="#">6 more</a>
                 <div class="testex">
                 <h >Tests:<a href="#">7</a></h>
                 </div>
              </div>

           </div>
          <hr class="hr-end">
          </div>



      <div id="expand" class="card lancersexpand1 large">
      <div class="row">
          <div class="col-md-2 lanpic">
            <img src="/images/tech2.jpg" width="100" height="100" class="img-circle">
          </div>
          <div class="col-md-9">
                  <a  class="lanceraex" href="#">Vishweswaran R.</a><br>
                  <p class="qualify">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
                  <div class="row">
                      <div class="col-md-2">
                        <span ><p>$5.56 / hr</p></span>
                      </div>
                      <div class="col-md-3">
                      <p>$2k+ earned </p>
                      </div>
                      <div class="col-md-6">
                      <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
                      </div>
                  </div>
                  <h class="aboutex">Concept artist and illustrator living in India participated over variety of stylist Concept artist and illustrator Concept artist and illustrator living in India participated over variety of stylist ....</h><br>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <a class="lanceraex" href="#">6 more</a>
                 <div class="testex">
                 <h >Tests:<a href="#">7</a></h>
                 </div>
              </div>

           </div>
          <hr class="hr-end">
          </div>



      <div id="expand" class="card lancersexpand1 large">
      <div class="row">
          <div class="col-md-2 lanpic">
            <img src="/images/tech2.jpg" width="100" height="100" class="img-circle">
          </div>
          <div class="col-md-9">
                  <a  class="lanceraex" href="#">Vishweswaran R.</a><br>
                  <p class="qualify">eBay & Amazon Guru | Store  Front & Template Designer | HTML5 | CSS3</p>
                  <div class="row">
                      <div class="col-md-2">
                        <span ><p>$5.56 / hr</p></span>
                      </div>
                      <div class="col-md-3">
                      <p>$2k+ earned </p>
                      </div>
                      <div class="col-md-6">
                      <span><p class="lancera float-left"><span class="glyphicon glyphicon-map-marker float-left"></span>India</p></span>
                      </div>
                  </div>
                  <h class="aboutex">Concept artist and illustrator living in India participated over variety of stylist Concept artist and illustrator Concept artist and illustrator living in India participated over variety of stylist ....</h><br>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <div class="chip chipex">
                   customer service
                  </div>
                  <a class="lanceraex" href="#">6 more</a>
                 <div class="testex">
                 <h >Tests:<a href="#">7</a></h>
                 </div>
              </div>

           </div>
          <hr class="hr-end">
          <a  href="#"><h class="help">Help rbs improve your search experience.</h></a>
        <div class="pull-right">
        <button class="empbut1" type="button" disabled > Previous</button>
        <a  class="pageno" href="#">1</a>
        <a class="pageno" href="#">2</a>
        <a class="pageno" href="#">3</a>
        <a class="pageno" href="#">4</a>
        <a class="pageno" href="#">5</a>
        <button class="empbut1" type="button" value="submit"> Next</button>
        </div>
          </div>
          </div>

</div>
</div>
@endsection
@section('footer')
  <script>
     $( document ).ready(function() {
       var request = $.ajax({
         url: "{{URL('/')}}/footer" ,
       type: "GET",       
    });
    request.done(function(msg){
       $('#dynamicfooter').html(msg);
   });
});
  </script>
  <div id="dynamicfooter"></div>
@endsection
