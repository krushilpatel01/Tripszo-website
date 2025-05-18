<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<h2 class="mb-4">Add Trip</h2>

<!-- Add Trip Form -->
<form action="#" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow">

  <!-- Trip Name -->
  <div class="mb-3">
    <label for="tripName" class="form-label">Trip Name</label>
    <input type="text" class="form-control" id="tripName" name="trip_name" required>
  </div>

  <!-- Destination -->
  <div class="mb-3">
    <label for="destination" class="form-label">Destination</label>
    <select class="form-select" name="destination_id" required>
      <option value="">-- Select Destination --</option>
      <option value="1">Ahmedabad</option>
      <option value="2">Vadodara</option>
    </select>
  </div>

  <!-- Trip Types -->
  <div class="mb-3">
    <label class="form-label">Trip Types</label><br>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="types[]" value="Adventure" id="typeAdventure">
      <label class="form-check-label" for="typeAdventure">Adventure</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="types[]" value="Family" id="typeFamily">
      <label class="form-check-label" for="typeFamily">Family</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="types[]" value="Couple" id="typeCouple">
      <label class="form-check-label" for="typeCouple">Couple</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="types[]" value="Wildlife" id="typeWildlife">
      <label class="form-check-label" for="typeWildlife">Wildlife</label>
    </div>
  </div>

  <!-- Days & Nights -->
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="days" class="form-label">Days</label>
      <input type="number" class="form-control" name="days" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="nights" class="form-label">Nights</label>
      <input type="number" class="form-control" name="nights" required>
    </div>
  </div>

  <!-- Price -->
  <div class="mb-3">
    <label for="price" class="form-label">Price (INR)</label>
    <input type="number" class="form-control" name="price" required>
  </div>

  <!-- Overview -->
  <div class="mb-3">
    <label for="overview" class="form-label">Overview</label>
    <textarea class="form-control" name="overview" rows="3" required></textarea>
  </div>

  <!-- Dynamic Itinerary -->
  <div class="mb-3">
    <label class="form-label">Itinerary (Day Wise)</label>
    <div id="itineraryContainer">
      <div class="day-box mb-2">
        <input type="text" name="itinerary_title[]" class="form-control mb-2" placeholder="Day 1 Title" required>
        <textarea name="itinerary_desc[]" class="form-control" rows="3" placeholder="Day 1 Description" required></textarea>
      </div>
    </div>
    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addDay()">Add Day</button>
    <button type="button" class="btn btn-sm btn-danger mt-2" onclick="removeDay()">Remove Day</button>
  </div>

  <!-- Inclusions -->
  <div class="mb-3">
    <label class="form-label">Select Inclusions</label>
    <div class="row">
      <div class="col-md-3 mb-2">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="inclusions[]" value="1" id="inc1">
          <label class="form-check-label" for="inc1">
            <img src="../uploads/inclusions/icon1.png" width="20" height="20" alt=""> Inclusion 1
          </label>
        </div>
      </div>
      <div class="col-md-3 mb-2">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="inclusions[]" value="2" id="inc2">
          <label class="form-check-label" for="inc2">
            <img src="../uploads/inclusions/icon2.png" width="20" height="20" alt=""> Inclusion 2
          </label>
        </div>
      </div>
    </div>
  </div>

  <!-- Exclusions -->
  <div class="mb-3">
    <label for="exclusions" class="form-label">Exclusions</label>
    <textarea class="form-control" name="exclusions" rows="3" required></textarea>
  </div>

  <!-- Things to Pack -->
  <div class="mb-3">
    <label for="things" class="form-label">Things to Pack</label>
    <textarea class="form-control" name="things_to_pack" rows="3" required></textarea>
  </div>

  <!-- Trip Image -->
  <div class="mb-3">
    <label for="tripImage" class="form-label">Trip Image</label>
    <input type="file" class="form-control" name="trip_img" accept="image/*" required>
  </div>

  <!-- Submit -->
  <button type="submit" class="btn btn-success">Add Trip</button>
</form>

<!-- Inclusion Add Form (Design Only) -->
<hr class="mt-5">
<h4>Add New Inclusion</h4>
<form method="POST" enctype="multipart/form-data" class="border p-3 bg-light mt-3">
  <div class="row">
    <div class="col-md-4">
      <input type="text" class="form-control mb-2" name="title" placeholder="Inclusion Title" required>
    </div>
    <div class="col-md-4">
      <input type="file" class="form-control mb-2" name="icon" required>
    </div>
    <div class="col-md-4">
      <button type="submit" name="add_inclusion" class="btn btn-info">Add Inclusion</button>
    </div>
  </div>
</form>


<!-- JS for Itinerary -->
<script>
  let dayCount = 1;
  function addDay() {
    dayCount++;
    const container = document.getElementById("itineraryContainer");
    const dayBox = document.createElement("div");
    dayBox.className = "day-box mb-2";
    dayBox.innerHTML = `
      <input type="text" name="itinerary_title[]" class="form-control mb-2" placeholder="Day ${dayCount} Title" required>
      <textarea name="itinerary_desc[]" class="form-control" rows="3" placeholder="Day ${dayCount} Description" required></textarea>
    `;
    container.appendChild(dayBox);
  }

  function removeDay() {
    const container = document.getElementById("itineraryContainer");
    if (container.children.length > 1) {
      container.removeChild(container.lastChild);
      dayCount--;
    }
  }
</script>

<?php include('../includes/footer.php'); ?>
