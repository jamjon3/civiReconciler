import React from 'react';
import ReactDOM from 'react-dom';
import ContactType from './ContactType';

export default class App extends React.Component {
  render() {
  return (
      <div>
        <ContactType />
      </div>
    );
  }
}

ReactDOM.render(<App />,document.getElementById('app'));