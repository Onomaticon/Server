<div class="feature-container">
  <div class="feature">
    <h2><?php print("API Home"); ?></h2>

    <p>
        The API can be used to retrieve information about ontologies and terms in the 
        Ontomasticon system. The API returns JSON formatted objects.
    </p>
  </div>

  <div class="feature">
    <h3>Terms endpoints</h3>
    <p>These endpoints return a term object.</p>

    <h4>/api/term/?term=</h4>
    <p>Given a term URL returns a JSON term object. The term must be HTML encoded.</p>

    <h4>/api/term/?shortname=</h4>
    <p>Given a term name returns a JSON term object.</p>
  </div>
</div>