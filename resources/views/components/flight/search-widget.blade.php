    <section class="container-all-booking mb-3">
        <button type="button" onclick="openTab(event, 'all-flights');" class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg">
            <i class="fas fa-arrow-left mr-1" aria-hidden="true"></i> Back
        </button>
        <header class="bg-fafafa p-4">
            <button type="button" onclick="openTab(event, 'all-flights');" class="btn btn-block gilroy-bold text-left text-fe2f70 font-20 mb-3 hsm">
                <i class="fas fa-arrow-left mr-1" aria-hidden="true"></i> Change Flight
            </button>
            <h4 class="gilroy-bold font-28 mb-2">New Flight Search</h4>
            <p class="gilroy-regular font-12 mb-0">Search new flight</p>
        </header>
        <div class="pt-0">
            <div class="rounded-lg p-4">
                <div class="grid-9">
                    <div><p class="gilroy-medium font-12 mb-0">From</p></div>
                    <div><p class="gilroy-medium font-12 mb-0">To</p></div>
                    <div>
                        <div class="position-relative inputField-box w-100">
                            <img class="icon-18px mr-1" src="/image/location.png">
                            <input type="text" class="inputField inputField-withicon" placeholder="Dubai">
                            </div>
                        </div>
                    <div>
                        <div class="position-relative inputField-box w-100">
                            <img class="icon-18px mr-1" src="/image/location.png">
                            <input type="text" class="inputField inputField-withicon" placeholder="Turkey">
                        </div>
                    </div>
                    <div>
                        <div class="position-relative inputField-box w-100">
                            <img class="icon-18px mr-1" src="/image/policy.png">
                            <input type="text" class="inputField inputField-withicon" placeholder="Departing Date">
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-end-responsive-left">					
                            <div>
                                <div class="trippbo-dropdown">
                                    <button class="gilroy-medium text-000941 font-12">1 Adult, 2 Children <i class="fa fa-angle-down font-14 font-weight-bold ml-1" aria-hidden="true"></i></button>
                                    <div>
                                        <p class="gilroy-medium font-12 mb-2" onclick="this.parentElement.style.display = 'none';"><img class="icon-10px mr-2 hlg" src="image/close.png"> Travelers</p>
                                        <p class="gilroy-medium font-10 mb-2 text-23242c opacity-0-5">Room 1</p>									
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="w-60"><span class="gilroy-medium font-12">Adult</span></div>						
                                            <div class="w-40">
                                                <div id="children-increament" class="increamentor">
                                                    <div><i class="fa fa-minus-circle increamentor-minus" aria-hidden="true"></i></div>						
                                                    <div><input type="text" class="increamentor-number" value="1" readonly="readonly"></div>						
                                                    <div><i class="fa fa-plus-circle increamentor-plus" aria-hidden="true"></i></div>						
                                                </div>
                                            </div>
                                        </div>										
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="w-60"><span class="gilroy-medium font-12">Children</span></div>						
                                            <div class="w-40">
                                            <div id="children-increament" class="increamentor">
                                            <div><i class="fa fa-minus-circle increamentor-minus increamentor-opacity increamentor-not-allowed" aria-hidden="true"></i></div>						
                                            <div><input type="text" class="increamentor-number increamentor-opacity" value="0" readonly="readonly"></div>						
                                            <div><i class="fa fa-plus-circle increamentor-plus" aria-hidden="true"></i></div>						
                                            </div>									
                                            </div>						
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end mb-2">
                                            <div><span class="gilroy-semi font-12 text-fe2f70">Add Room</span></div>						
                                        </div>									
                                        <div><button type="button" class="btn btn-block btn-000941 font-12">Done</button></div>								
                                    </div>
                                </div>						
                            </div>									
                        </div>
                    </div>
                    <div><div><button type="button" class="btn btn-block gilroy-medium btn-fe2f70 px-5">Search Again</button></div></div>
                </div>	
            </div>
        </div>
    </section>
