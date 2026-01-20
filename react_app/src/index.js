import ReactDOM from 'react-dom/client';
import './index.css';
import { Panel } from './panel';
import { LogReport } from './log_report';

const buttons = [
  {text: "add", color: "#eee"}, 
  {text: "edit", color: "#eee"},
  {text: "delete", color: "#FF5733", inverse: true}
]
      
const buttons2 = [
  {text: "a", color: "#34eb8f"}, 
  {text: "b", color: "#1f8753", inverse: true},
  {text: "c", color: "#34eb8f"},
  {text: "d", color: "#1f8753", inverse: true},
  {text: "e", color: "#34eb8f"}
]
      
const buttons3 = [
  {text: "info", color: "#349beb", inverse: true}, 
]

const comp_el = document.getElementById('react-component');
if (comp_el)
{
  const comp = ReactDOM.createRoot(comp_el);
  comp.render(
    <>
    <Panel shadow buttons={buttons} />
    <Panel buttons={buttons} />
    <Panel buttons={buttons2} />
    <Panel buttons={buttons3} />
    <Panel shadow buttons={buttons3} />
    </>
  );
}




const log_report = ReactDOM.createRoot(document.getElementById('logged-users'));
log_report.render(
  <LogReport/>
)