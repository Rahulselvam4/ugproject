<?php
  function display_alert($errors)
  {
    foreach ($errors as $error) {
      echo '<div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
      <strong>⚠️⚠️⚠️ &nbsp;&nbsp; Validation Error</strong> &nbsp;&nbsp;⚠️⚠️⚠️ &nbsp;&nbsp;&nbsp;&nbsp;' . '<font size="4" face = "Comic sans MS">' . $error . '</font>';

      echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
  }

  function display_success($errors)
  {
    foreach ($errors as $error) {
      echo '<div class="alert alert-success alert-dismissible fade show fixed-bottom" role="alert">
      <strong>👍👍👍 &nbsp;&nbsp; SUCCESS </strong> &nbsp;&nbsp;👍👍👍 &nbsp;&nbsp;&nbsp;&nbsp;' . '<font size="4" face = "Comic sans MS">' . $error . '</font>';

      echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
  }

  function display_danger($errors)
  {
    foreach ($errors as $error) {
      echo '<div class="alert alert-danger alert-dismissible fade show fixed-bottom" role="alert">
      <strong>👎👎👎 &nbsp;&nbsp; FAILED </strong> &nbsp;&nbsp;👎👎👎 &nbsp;&nbsp;&nbsp;&nbsp;' . '<font size="4" face = "Comic sans MS">' . $error . '</font>';

      echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
  }
