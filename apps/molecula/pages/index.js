import React, { useState } from 'react';
import { MicroApp, useModel } from 'umi';
import style from './index.css';

export default function() {
  const [microAppState, setState] = useState('Hello');
  const { setQiankunGlobalState } = useModel('@@qiankunStateForSlave');

  return (
    <div className={style.container}>
      <h2>Welcome to use QianKun ~</h2>
      <button
        onClick={() => setQiankunGlobalState({ slogan: 'Hello Qiankun' })}
      >
        Modify global state
      </button>
      <button onClick={() => setState(s => s + 'o')}>Modify sub application props</button>
      <MicroApp
        testProp1={microAppState}
        base={window.originalBaseName || '/demo'}
        name="app1"
      />
    </div>
  );
}
