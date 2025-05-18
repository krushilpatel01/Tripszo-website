<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<h2 class="mb-4">Trip Details</h2>

<div class="accordion" id="tripDetailsAccordion">

  <!-- Trip Overview -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOverview">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOverview" aria-expanded="true">
        🧭 Trip Overview
      </button>
    </h2>
    <div id="collapseOverview" class="accordion-collapse collapse show" data-bs-parent="#tripDetailsAccordion">
      <div class="accordion-body">
        <p>Brief summary of the trip goes here. You can describe what travelers can expect, destinations covered, etc.</p>
      </div>
    </div>
  </div>

  <!-- Itinerary -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingItinerary">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseItinerary">
        📅 Itinerary
      </button>
    </h2>
    <div id="collapseItinerary" class="accordion-collapse collapse" data-bs-parent="#tripDetailsAccordion">
      <div class="accordion-body">
        <ul class="list-group">
          <li class="list-group-item"><strong>Day 1:</strong> Arrival and City Tour</li>
          <li class="list-group-item"><strong>Day 2:</strong> Adventure Activities</li>
          <li class="list-group-item"><strong>Day 3:</strong> Departure</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Inclusions -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingInclusions">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInclusions">
        ✅ Inclusions
      </button>
    </h2>
    <div id="collapseInclusions" class="accordion-collapse collapse" data-bs-parent="#tripDetailsAccordion">
      <div class="accordion-body">
        <ul class="list-group">
          <li class="list-group-item">Hotel Accommodation</li>
          <li class="list-group-item">Daily Breakfast</li>
          <li class="list-group-item">Local Sightseeing</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Exclusions -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingExclusions">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExclusions">
        ❌ Exclusions
      </button>
    </h2>
    <div id="collapseExclusions" class="accordion-collapse collapse" data-bs-parent="#tripDetailsAccordion">
      <div class="accordion-body">
        <ul class="list-group">
          <li class="list-group-item">Personal Expenses</li>
          <li class="list-group-item">Travel Insurance</li>
          <li class="list-group-item">Tips & Porterage</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Things to Pack -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingPack">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePack">
        🎒 Things to Pack
      </button>
    </h2>
    <div id="collapsePack" class="accordion-collapse collapse" data-bs-parent="#tripDetailsAccordion">
      <div class="accordion-body">
        <ul class="list-group">
          <li class="list-group-item">Warm Clothes</li>
          <li class="list-group-item">Travel Documents</li>
          <li class="list-group-item">Medicines</li>
          <li class="list-group-item">Camera</li>
        </ul>
      </div>
    </div>
  </div>

</div>

<?php include('../includes/footer.php'); ?>
