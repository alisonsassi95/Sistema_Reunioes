<page size="A4">

    <div class="header">
        ID do Exame: <b>{{$diagnostic->exam_id}}</b>
      <br>Paciente: <b>{{$exam->name}}</b>
      <br>Médico: <b>{{$medic->name}}</b>
      <br>
      <br>
      
    </div>

    <h3>LAUDO TÉCNICO</h3>
  
    <table>
        <thead>
            <th>
            {{$diagnostic->diagnostic}}
            </th> 
        </thead>
    </table>

    <div class="footer">
        ClinisomRad - Clínica de Ultrassom e Radiodiagnóstico
        <br>Av. Davi José Martins, 79, Centro - Ijuí - 98.700-000
        <br>08.996.798/0001-85 - (55)3332-2555
        <br>
            
    </div>

 </page>

 <script>
  window.print();
</script>

<style>

h3 {
    text-align: center;
    font-size: 25px;
}

body {
  background: rgb(204, 204, 204);
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;

}
page[size="A4"] {
  width: 21cm;
  height: 29.7cm;
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;
}
@media print {
  body,
  page {
    margin: 0;
    box-shadow: 0;
  }
}
.header {
    padding-left: 30px;
  padding-top: 45px;
  text-align: left;
    padding-bottom: 30px;
}
.footer{
    padding-top: 100px;
  text-align: center;
    padding-bottom: 30px; 
}
table {
    margin:auto;
  border-collapse: collapse;
  width: 70%;
  font-size: 80%;
}
table th {
  background-color: white;
  color: black;
  text-align: center;
}
th,
td {
  border: 0px solid #ddd;
  text-align: start;
  text-align: left;
  width: 500px;
  height: 700px;
}
tr:nth-child(even) {
  background-color: #f2f2f2
}
</style>