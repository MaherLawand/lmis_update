if(document.URL.includes("welcome.php")){
    let upr_next=document.getElementById('edit');
        let pid=document.getElementById('pid');
        let pcode=document.getElementById('pCode');
        let egn=document.getElementById('egn');
        let pname=document.getElementById('pName');
        let tname=document.getElementById('tName');
        let sps=document.getElementById('sps');
        let pparl=document.getElementById('proofAcc');
        let dhet=document.getElementById('DHET');
        let dhetnb=document.getElementById('dhetnb');
        let dhet_start_date=document.getElementById('DHET-startdate');
        let dhet_end_date=document.getElementById('DHET-enddate');
        let bbbee_rating=document.getElementById('BBBEE-lvl');
        let bbbee_rec=document.getElementById('BBBEE-rec');
        let num_fulltime_staff=document.getElementById('num-staff');
        let conum_staff=document.getElementById('num-constaff');
        let main_province=document.getElementById('province');
        let lat_deg=document.getElementById('Latitude-deg');
        let lat_min=document.getElementById('Latitude-min');
        let lat_sec=document.getElementById('Latitude-sec');
        let long_deg=document.getElementById('Longitude-deg');
        let long_min=document.getElementById('Longitude-min');
        let long_sec=document.getElementById('Longitude-sec');
        let first_name=document.getElementById('fn');
        let title=document.getElementById('title');
        let last_name=document.getElementById('ln');
        let pos=document.getElementById('po');
        let tel_num=document.getElementById('tel');
        let cell_num=document.getElementById('cell');
        let email=document.getElementById('emailContact');
        let physical_address=document.getElementById('physicaladdress');
        let postal_address=document.getElementById('postaladdress');
        let house_ph=document.getElementById('housePH');
        let house_po=document.getElementById('housePO');
        let street_ph=document.getElementById('streetPH');
        let street_po=document.getElementById('streetPO');
        let suburb_ph=document.getElementById('suburbPH');
        let suburb_po=document.getElementById('suburbPO');
        let TownCity_ph=document.getElementById('TownCityPH');
        let TownCity_po=document.getElementById('TownCityPO');
        let postalCode_ph=document.getElementById('postalCodePH');
        let postalCode_po=document.getElementById('postalCodePO');
        let Province_ph=document.getElementById('ProvincePH');
        let Province_po=document.getElementById('ProvincePO');
        localStorage.setItem('id',pid.value);
        localStorage.setItem('code',pcode.value);
        localStorage.setItem('egn',egn.value);
        localStorage.setItem('pname',pname.value);
        localStorage.setItem('tname',tname.value);
        localStorage.setItem('sps',sps.value);
        localStorage.setItem('pparl',pparl.value);
        localStorage.setItem('dhet',dhet.value);
        localStorage.setItem('dhet_num',dhetnb.value);
        localStorage.setItem('dhet_start',dhet_start_date.value);
        localStorage.setItem('dhet_end',dhet_end_date.value);
        localStorage.setItem('bbbee_rating',bbbee_rating.value);
        localStorage.setItem('bbbee_rec',bbbee_rec.value);
        localStorage.setItem('num_staff',num_fulltime_staff.value);
        localStorage.setItem('conum_staff',conum_staff.value);
        localStorage.setItem('main_province',main_province.value);
        localStorage.setItem('lat_deg',lat_deg.value);
        localStorage.setItem('lat_min',lat_min.value);
        localStorage.setItem('lat_sec',lat_sec.value);
        localStorage.setItem('long_deg',long_deg.value);
        localStorage.setItem('long_min',long_min.value);
        localStorage.setItem('long_sec',long_sec.value);
        localStorage.setItem('first_name',first_name.value);
        localStorage.setItem('title',title.value);
        localStorage.setItem('last_name',last_name.value);
        localStorage.setItem('pos',pos.value);
        localStorage.setItem('telnum',tel_num.value);
        localStorage.setItem('cellnum',cell_num.value);
        localStorage.setItem('email',email.value);
        localStorage.setItem('physicaladdress',physical_address.value);
        localStorage.setItem('postaladdress',postal_address.value);
        localStorage.setItem('houseph',house_ph.value);
        localStorage.setItem('housepo',house_po.value);
        localStorage.setItem('streetph',street_ph.value);
        localStorage.setItem('streetpo',street_po.value);
        localStorage.setItem('suburbph',suburb_ph.value);
        localStorage.setItem('suburbpo',suburb_po.value);
        localStorage.setItem('TownCityph',TownCity_ph.value);
        localStorage.setItem('TownCitypo',TownCity_po.value);
        localStorage.setItem('postalCodeph',postalCode_ph.value);
        localStorage.setItem('postalCodepo',postalCode_po.value);
        localStorage.setItem('Provinceph',Province_ph.value);
        localStorage.setItem('Provincepo',Province_po.value);


    
}
if(document.URL.includes("QMS.php")){
    for (let i = 0; i < localStorage.length; i++) {
        const key = localStorage.key(i);
        console.log(`${key}: ${localStorage.getItem(key)}`);
    }
}
    

