<?= $data['title']; ?>


<form action="<?= URLROOT; ?>/countries/create" method="post">
  <table>
    <tbody>
      <tr>
        <td>
          <label for="Name">Naam van het land</label>
          <input type="text" name="Name" id="Name">
        </td>
      </tr>
      <tr>
        <td>
          <label for="CapitalCity">Naam van de hoofstad</label>
          <input type="text" name="CapitalCity" id="CapitalCity">
        </td>
      </tr>
      <tr>
        <td>
        <select name="Continent">
              <option value="Europa">Europa</option>
              <option value="Azi&euml;">Azi&euml</option>
              <option value="Noord-Amerika">Noord-Amerika</option>
              <option value="Zuid-Amerika">Zuid-Amerika</option>
              <option value="Oceani&euml">Oceani&euml</option>
              <option value="Antarctica">Antarctica</option>
              <option value="Afrika">Afrika</option>
            </select>
        </td>
      </tr>
      <tr>
        <td>
          <label for="Population">Aantal inwoners</label>
          <input type="number" name="Population" id="Population">
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" value="Verzenden">
        </td>
      </tr>
    </tbody>
  </table>
</form>