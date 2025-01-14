<h3 class="fw-bold mb-3">Pendaftaran <i class="fas fa-pencil-alt" style="color: tomato"></i></h3>
<h6 class="op-7 mb-2">Pendaftaran pengunjung GYM</h6>

<div class="card">
  <form action="backend/tambahPengunjung.php" method="post">
    <div class="form-group">
      <label for="nama_lengkap">Nama Lengkap</label>
      <input
        type="text"
        class="form-control"
        id="nama_lengkap"
        placeholder="Masukan nama lengkap"
        name="nama_lengkap"
      />
    </div>
  
    <div class="form-group">
      <label for="no_hp"></label>No Handphone</label>
      <input
        type="text"
        class="form-control"
        id="no_hp"
        placeholder="Masukan No handphone"
        name="no_hp"
      />
    </div>
  
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-text">Alamat</span>
        <textarea
          class="form-control"
          aria-label="With textarea"
          name="alamat"
        ></textarea>
      </div>
    </div>

    <div class="form-group">
      <label>Personal Trainer</label><br />
      <div class="d-flex">
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            name="personal_trainer"
            id="flexRadioDefault1"
            value="gunakan"
            onclick="toggleTrainerDropdown(true)"
          />
          <label class="form-check-label" for="flexRadioDefault1">
            Gunakan
          </label>
        </div>
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            name="personal_trainer"
            id="flexRadioDefault2"
            value="tidak"
            checked
            onclick="toggleTrainerDropdown(false)"
          />
          <label class="form-check-label" for="flexRadioDefault2">
            Tidak
          </label>
        </div>
      </div>

      <!-- Dropdown untuk memilih personal trainer -->
      <div class="mt-3" id="trainerDropdown" style="display: none;">
        <label for="id_pt">Pilih Personal Trainer</label>
        <select class="form-control" id="id_pt" name="id_pt">
          <option value="PT01">Rusdi (PT01)</option>
          <option value="PT02">Rusman (PT02)</option>
        </select>
      </div>
    </div>



    <div class="form-group">
      <label class="form-label">Jenis Pengunjung</label>
      <div class="selectgroup w-100">
        <label class="selectgroup-item">
        <input type="radio" name="value" value="bulanan" class="selectgroup-input" onclick="updateDate('bulanan')">
        <span class="selectgroup-button">Bulanan</span>
        </label>
        
        <label class="selectgroup-item">
        <input type="radio" name="value" value="harian" class="selectgroup-input" onclick="updateDate('harian')">
        <span class="selectgroup-button">Harian</span>
        </label>
      </div>
    </div>
  
    <div class="form-group">
      <label for="tgl_bergabung">Tanggal Bergabung </label>
      <input
      type="text"
      class="form-control"
      id="tgl_bergabung"
      placeholder="Tanggal Bergabung"
      name="tgl_bergabung"
      readonly
      />
    </div>
  
    <div class="form-group">
      <label for="masa_berlaku">Masa Berlaku</label>
      <input
      type="text"
      class="form-control"
      id="masa_berlaku"
      placeholder="Masa berlaku"
      name="masa_berlaku"
      readonly
      />
    </div>
  
    <div class="form-group">
      <div class="input-group mb-3">
        <span class="input-group-text">Rp</span>
        <input
          type="text"
          id = "amount"
          class="form-control"
          aria-label="Total (Rupiah)"
          name="amount"
          readonly
        />
        <span class="input-group-text">,00</span>
      </div>
    </div>
  
    <div class="form-group">
      <div class="input-icon">
        <span class="input-icon-addon">
          <i class="fa fa-user"></i>
        </span>
        <input
          type="text"
          class="form-control"
          placeholder="ID Pengunjung"
          id = "id_pengunjung_pendaftaran"
          name="id_pengunjung_pendaftaran"
          readonly
        />
      </div>
    </div>
  
    <div class="card-body">
      <p class="demo">
        <button type="submit" class="btn btn-primary">Daftar</button>
      </p>
    </div>
  </form>
</div>


