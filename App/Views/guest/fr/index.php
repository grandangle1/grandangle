<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <img src="img/home/homePresent.jpg" class="home">
        </div>
    </div>
    <div class="row">
       <div class="col-lg-4 mt-1">
           <div class="card text-light text-center ht pt-1">
               <div class="card-body">
                   <h3 class="pb-3">Informations</h3>
                   <p class="text-center pb-1">18 Place François Sicard 37000 Tours <br>
                       Téléphone : 02 46 56 47 52</p>
                   <p class="text-center"><span class="bold">Ouvert du mardi au dimanche</span> de 10h00 à 18h00 (dernière entrée 17h15)<br>
                       <span class="bold">Nocturne le jeudi</span> jusqu’à 22h00 pour les expositions temporaires (dernière entrée 21h15)<br>
                       <span class="bold">Entrée libre </span>pour les collections permanentes.</p>
               </div>
           </div>
       </div>
       <div class="col-lg-4 mt-1">
            <div class="card text-center text-light ht pt-1">
                <div class="card-body text-center">
                    <h3 class="pb-4">Grand Angle on a year, it's: </h3>
                    <div class="float-left">
                        <div class="ml-5 pl-3"><p class="font-italic"><span class="fsize">22 500</span><br>visites</p></div>
                        <div class="ml-5 pl-3"><p class="font-italic"><span class="fsize"><?= $artist->nbAr; ?></span><br>artistes</p></div>
                    </div>
                    <div class="float-right">
                        <div class="mr-5 pr-3"><p class="font-italic"><span class="fsize"><?= $oeuvres->nbOeu; ?></span><br>oeuvres</p></div>
                        <div class="mr-5 pr-3"><p class="font-italic"><span class="fsize">12917</span><br>m² d'exposition</p></div>
                    </div>
                </div>
            </div>
        </div>
       <div class="col-lg-4 mt-1">
           <div class="card text-light text-center ht pt-1">
               <div class="card-body">
                   <h3 class="pb-5">Nos expositions</h3>
                   <p>Collections thématiques, expositions diverses et passionnantes, le musée Grand Angle
                       est le musée de la région Centre qui expose le plus d'oeuvre à l'année. Une force qui prend une dimension encore plus significative
                       lorsqu'elle est accessible, partagée et appropriée par tous.
                   </p>
               </div>
           </div>
       </div>
    </div>
</div>
