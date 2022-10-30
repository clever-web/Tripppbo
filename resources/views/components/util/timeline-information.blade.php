<section class="container-all-booking mb-3">
    <header class="bg-fafafa p-4">
        <h4 class="gilroy-bold font-28 mb-0">Mon 28 Aug</h4>
    </header>
    <div class="pt-0">
        <div class="rounded-lg p-3">
            <div class="timeline">
                @foreach($timelineInfo as $timelineItem)
                <div>
                    <div class="timeline-container">
                        <div>
                            <p class="gilroy-medium font-16 mb-0">{{ date('H:i', strtotime($timelineItem->Origin->DateTime)) }}</p>
                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">{{ date('d M', strtotime($timelineItem->Origin->DateTime)) }}</p>
                        </div>
                        <div></div>
                        <div>
                            <h4 class="gilroy-bold font-16 mb-0">{{ $timelineItem->Origin->AirportName }}</h4>
                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">({{ $timelineItem->Origin->AirportCode }})</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="timeline-container">
                        <div>
                            <?php
                                $originDepartureDateTime = new DateTime($timelineItem->Origin->DateTime);
                                $destinationArrivalDateTime = new DateTime($timelineItem->Destination->DateTime);
                                $duration = $destinationArrivalDateTime->diff($originDepartureDateTime);
                            ?>
                            <p class="gilroy-medium font-12 opacity-0-5 mb-0 pt-4">{{ $duration->format('%hh %im') }}</p>
                        </div>
                        <div></div>
                        <div>
                            <div class="timeline-accordion rounded-lg">
                                <button class="gilroy-semi font-14 timeline-accordion-active">{{ $timelineItem->OperatorName }} {{ $timelineItem->FlightNumber }}</button>
                                <div style="max-height: fit-content;">
                                    <p>You will be travelling by {{ $timelineItem->OperatorName }} and the flight number is {{ $timelineItem->FlightNumber }}. The operator code is {{ $timelineItem->OperatorCode }}.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="timeline-container">
                        <div>
                            <p class="gilroy-medium font-16 mb-0">{{ date('H:i', strtotime($timelineItem->Destination->DateTime)) }}</p>
                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">{{ date('d M', strtotime($timelineItem->Destination->DateTime)) }}</p>
                        </div>
                        <div></div>
                        <div>
                            <h4 class="gilroy-bold font-16 mb-0">{{ $timelineItem->Destination->AirportName }}</h4>
                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">({{ $timelineItem->Destination->AirportCode }})</p>
                        </div>
                    </div>
                </div>
                @if(!$loop->last)
                <div class="transferred">
                    <div style="display: none">
                        <div class="transferred-container">
                            <div>
                                <p class="gilroy-medium font-16 mb-0">14:55</p>
                                <p class="gilroy-medium font-12 opacity-0-5 mb-0">23 Aug</p>
                            </div>
                            <div></div>
                            <div>
                                <h4 class="gilroy-bold font-16 mb-0">Dubai</h4>
                                <p class="gilroy-medium font-12 opacity-0-5 mb-0">(International Airport)</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="transferred-container">
                            <div>
                                <p class="gilroy-medium font-16 text-ff0000 mb-0">time</p>
                            </div>
                            <div></div>
                            <div>
                                <p class="gilroy-medium font-16 text-ff0000 mb-0">transferred</p>
                            </div>
                        </div>
                    </div>
                    <div style="display: none">
                        <div class="transferred-container">
                            <div>
                                <p class="gilroy-medium font-16 mb-0">16:00</p>
                                <p class="gilroy-medium font-12 opacity-0-5 mb-0">23 Aug</p>	
                            </div>
                            <div></div>
                            <div>
                                <h4 class="gilroy-bold font-16 mb-0">Dubai</h4>
                                <p class="gilroy-medium font-12 opacity-0-5 mb-0">(International Airport)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: none">
                    <div class="timeline-container">
                        <div>
                            <p class="gilroy-medium font-12 opacity-0-5 mb-0 pt-4">03h10m</p>	
                        </div>
                        <div></div>
                        <div>
                            <div class="timeline-accordion rounded-lg">
                                <button class="gilroy-semi font-14 timeline-accordion-active">Etihad Airline PC1212</button>
                                <div style="max-height: fit-content;">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
