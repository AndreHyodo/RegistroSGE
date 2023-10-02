// const data = [
//   {
//     TestCell: "A01",
//     Causal: "yx"
//   },
//   {
//     TestCell: "A02",
//     Causal: "causal2"
//   },
//   {
//     TestCell: "A03",
//     Causal: "causal3"
//   },
//   {
//     TestCell: "A04",
//     Causal: "causal4"
//   },
//   {
//     TestCell: "A05",
//     Causal: "causal5"
//   },
//   {
//     TestCell: "A10",
//     Causal: "causal6"
//   },
//   {
//     TestCell: "A11",
//     Causal: "causal7"
//   },
//   {
//     TestCell: "A12",
//     Causal: "causal8"
//   },
//   {
//     TestCell: "A06",
//     Causal: "causal9"
//   },
//   {
//     TestCell: "A07",
//     Causal: "causal10"
//   },
//   {
//     TestCell: "A08",
//     Causal: "causal11"
//   },
//   {
//     TestCell: "A09",
//     Causal: "causal12"
//   },
//   {
//     TestCell: "B01",
//     Causal: "causal13"
//   },
//   {
//     TestCell: "B02",
//     Causal: "causal14"
//   },
//   {
//     TestCell: "B03",
//     Causal: "causal15"
//   },
//   {
//     TestCell: "B04",
//     Causal: "causal16"
//   },
//   {
//     TestCell: "B05",
//     Causal: "causal17"
//   },
//   {
//     TestCell: "B06",
//     Causal: "causal18"
//   }
// ];

function leDados () {
  let strDados = localStorage.getItem('db');
  let objDados = {};

  if (strDados) {
      objDados = JSON.parse (strDados);
  }
  else {
      objDados = { data : [
        {
          TestCell: "A01",
          Causal: "yx"
        },
        {
          TestCell: "A02",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "A03",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "A04",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "A05",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "A10",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "A11",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "A12",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "A06",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "A07",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "A08",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "A09",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "B01",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "B02",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "B03",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "B04",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "B05",
          Causal: "Motor Funcionando"
        },
        {
          TestCell: "B06",
          Causal: "Motor Funcionando"
        }
      ]}
  }

  return objDados;
}

function salvaDados (dados) {
  localStorage.setItem ('db', JSON.stringify (dados));
}

function alterLocalStorage(testCell, causal) {

  sync = 1;

  const data = leDados();

  for (const item of data.data) {
    if (item.TestCell === testCell) {
      item.Causal = causal;
    }
  }

  salvaDados(data);
}

function getCausalFromLgetocalStorage(testCell) {
  const data = leDados();

  for (const item of data.data) {
    if (item.TestCell === testCell) {
      return item.Causal;
    }
  }

  return null;
}

