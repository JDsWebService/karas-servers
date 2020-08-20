<a href="#" class="badge badge-secondary" data-toggle="modal" data-target="#battlemetricsURLHelpModal">?</a>
<!-- Modal -->
<div class="modal fade" id="battlemetricsURLHelpModal" tabindex="-1" aria-labelledby="battlemetricsURLHelpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="battlemetricsURLHelpModalLabel">How to Find Your Battlemetrics URL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    You can find your Battlemetrics Player URL by entering your Steam Username or Epic Games Username and clicking on the "Find my URL" button. Once you've been brought to the Battlemetrics Search Page, find your username, and click on it. The url it directs you to is your Battlemetrics Profile URL.
                </p>
                <input type="text" class="mt-1 form-control" id="findBattlemetricsURLField">
                <a href="#" id="findBattlemetricsURLLink" target="_blank" class="btn btn-success btn-sm btn-block mt-2">Find My URL</a>
                <script>
                    document.getElementById("findBattlemetricsURLField").onkeyup = function() {
                       document.getElementById("findBattlemetricsURLLink").href = "https://www.battlemetrics.com/players?filter%5Bsearch%5D=" + this.value + "&filter%5BplayerFlags%5D=&filter%5Bserver%5D%5Bsearch%5D=Kara%27s&filter%5Bserver%5D%5Bgame%5D=ark&sort=score";   
                    }
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>