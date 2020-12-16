import { h, render, Component } from 'preact'
import styles from './index.css';

class App extends Component {
  constructor() {
    super();
    this.state = {}
  }
  render(props, state) {
    return (
      <div>
        <h1 className="title">Hello {props.app.id}!</h1>
      </div>
    )
  }
}

let apps = window.mowp_atomos;
apps.forEach(app => {
  render(<App app={app} />, document.getElementById(app.id))
});