@extends('layouts.app')

@section('title', 'F.A.Q.')

@section('content')

	<section class="section-default section-xs" id="faq">
	    <div class="container">
	        <div class="row">
	            
				<div class="col-sm-12">
					<h1>Frequently Asked Questions</h1>
					<hr>
					<div class="accordion" id="faqAccordian">

						{{-- Question 1 --}}
						<div class="card">
							<div class="card-header" id="headingOne">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										I can’t find my server anymore, where did it go?
									</button>
								</h2>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordian">
								<div class="card-body">
									This is a known problem. Refresh until you find the desired server, or you can use the direct links in the #server-info section, and then favorite the server to find it again.
								</div>
							</div>
						</div>

						{{-- Question 2 --}}
						<div class="card">
							<div class="card-header" id="headingTwo">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										The server is updating. How long until it’s back up?
									</button>
								</h2>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordian">
								<div class="card-body">
									It should be back up within 10 mins, unless stated otherwise. Some servers take longer than others though, so please keep refreshing the list until your server appears. You can also check the #server-statuses channel to see if your server is running. Tames will be saved and resume after the server restarts.
								</div>
							</div>
						</div>

						{{-- Question 3 --}}
						<div class="card">
							<div class="card-header" id="headingThree">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										Someone has built too close to my base/left their dinos close to my base?
									</button>
								</h2>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordian">
								<div class="card-body">
									Please make an #ark-support-ticket, and an admin will help you shortly. Please be sure to list coordinates, your in-game name, and tribe name to make it easier on the admin. 
									<br>
									Blocking Cave entrances that have Tribute Items and blocking paths up and around the Volcano is not allowed and structures will be destroyed no warning.
								</div>
							</div>
						</div>

						{{-- Question 4 --}}
						<div class="card">
							<div class="card-header" id="headingFour">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
										Someone has built close to/on top of a resource node. Where do I report this?
									</button>
								</h2>
							</div>
							<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordian">
								<div class="card-body">
									At this time, this is allowed, due to the high availability of resources in various places on the maps. If this becomes a massive issue, Management will revisit the issue and make further determination.
								</div>
							</div>
						</div>

						{{-- Question 5 --}}
						<div class="card">
							<div class="card-header" id="headingFive">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
										What are the multipliers for my server?
									</button>
								</h2>
							</div>
							<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordian">
								<div class="card-body">
									Multipliers are listed in the #server-info section.
								</div>
							</div>
						</div>

						{{-- Question 6 --}}
						<div class="card">
							<div class="card-header" id="headingSix">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
										How long will my base last? I saw a base with an Expire Date?
									</button>
								</h2>
							</div>
							<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#faqAccordian">
								<div class="card-body">
									The timer is based on the last time someone in the tribe was “near” the base. Once the timer is up, the base is able to be cleared away to make room for new players. Decay timers are 3d for thatch, 7d for wood, 14d for stone, 28d metal. Other items, such as vaults, have a longer timer. Dinos last for 7 days before they become claimable.
								</div>
							</div>
						</div>

						{{-- Question 7 --}}
						<div class="card">
							<div class="card-header" id="headingSeven">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
										I can’t post a picture in the discord?
									</button>
								</h2>
							</div>
							<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#faqAccordian">
								<div class="card-body">
									Please go to #server-rules and click the reaction role to assign yourself access to all of our channels, then feel free to post your picture in the #media to keep the general chat clear, unless the picture pertains to a #ark-support-ticket  issue. You can also click the clock icon there to assign yourself the notification role, which will inform you of planned maintenance, as well as events and other pertinent information.
								</div>
							</div>
						</div>

						{{-- Question 8 --}}
						<div class="card">
							<div class="card-header" id="headingEight">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
										I need an admin. How do I contact them?
									</button>
								</h2>
							</div>
							<div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#faqAccordian">
								<div class="card-body">
									Please submit a report by going to the #ark-support-ticket channel and clicking the envelope, so someone can help you ASAP. Please refrain from tagging admins unless there is an emergency issue, such as a server going down, as we could be helping others or sleeping (yes, we do sleep sometimes).
								</div>
							</div>
						</div>

						{{-- Question 9 --}}
						<div class="card">
							<div class="card-header" id="headingNine">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
										How do I transfer between servers?
									</button>
								</h2>
							</div>
							<div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#faqAccordian">
								<div class="card-body">
									You can go to any obelisk on the map and open it. There will be a button that says “travel to another server”. This will bring up a list of all available servers to transfer to. Please note that not all dinos can go to all servers, and this will only transfer what you have on your character. Also, eggs don’t always transfer, so it might be best to hatch the dino and then cryo it for transfers. You cannot transfer if your inventory contains any "trophies", i.e. Argentavis talons, Rex arms, etc. This includes boss trophies AND Artifacts as well.
									<br>
									<strong>Please do not leave dinos near the obelisks when you transfer, as these are also boss teleports. Your dino may get sucked into someone's boss fight and we won't be replacing them.</strong>
								</div>
							</div>
						</div>

						{{-- Question 10 --}}
						<div class="card">
							<div class="card-header" id="headingTen">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
										I want to transfer from EGS to Steam and keep my levels? Can I?
									</button>
								</h2>
							</div>
							<div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#faqAccordian">
								<div class="card-body">
									If you are staying on an Xplay server, sure! Please submit an #ark-support-ticket with a screenshot of your EGS character screen, and an admin will be happy to help you. You will keep your dinos, but we cannot transfer imprints.
								</div>
							</div>
						</div>

						{{-- Question 11 --}}
						<div class="card">
							<div class="card-header" id="headingEleven">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
										I want to transfer to the Modded Cluster, how do I do that?
									</button>
								</h2>
							</div>
							<div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#faqAccordian">
								<div class="card-body">
									<p class="text-dark">
										<strong>If you want to transfer to the Modded Cluster, you will have to start from scratch.</strong> Modded is a completely different experience from the regular servers, and has a MUCH different leveling curve. It's more about the mods and you level up much faster than on vanilla.
									</p>
									<p class="text-dark">
										<strong>What is max level?</strong>
									</p>
									<p class="text-dark">
										XPLAY CLUSTER
										<br>
										Regular dinos -150
										<br>
										Teks-180
										<br>
										Wyverns 190-200	
									</p>
									<p class="text-dark">
										MODDED CLUSTER
										<br>
										Regular dinos - 300
										<br>
										Teks - 360
										<br>
										Wyverns - 370-380
									</p>
								</div>
							</div>
						</div>

						{{-- Question 12 --}}
						<div class="card">
							<div class="card-header" id="headingTwelve">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
										Where are the servers located?
									</button>
								</h2>
							</div>
							<div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#faqAccordian">
								<div class="card-body">
									In Northeast US, in the EST/EDT time zone. There are 5 physical servers, 3 of which run the cluster spread out. They are HP Servers with Dual E5-2680 CPUs and 192gb Ram. Storage is SSD and NVME for ark data.
								</div>
							</div>
						</div>

						{{-- Question 13 --}}
						<div class="card">
							<div class="card-header" id="headingThirteen">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
										Best way to spoil meat quickly?
									</button>
								</h2>
							</div>
							<div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#faqAccordian">
								<div class="card-body">
									Right-click the stack of me, choose split stack, split all. This will make each stack of meat (1) and it will spoil faster.
								</div>
							</div>
						</div>

						{{-- Question 13 --}}
						<div class="card">
							<div class="card-header" id="headingFourteen">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
										Is there a cooldown on Mindwipes? How many Mindwipes can I use?
									</button>
								</h2>
							</div>
							<div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#faqAccordian">
								<div class="card-body">
									Mindwipes are unlimited, and there is no cooldown for them.
								</div>
							</div>
						</div>

					</div> <!-- /.accordian -->


				</div> <!-- /.col-sm-12 -->
	        </div>      <!-- End row -->
	    </div>      <!-- End container -->
	</section>   <!-- End section -->

@endsection