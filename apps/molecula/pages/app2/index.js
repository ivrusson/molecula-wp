import { MicroApp } from 'umi';

export default function() {
  return (
    <div>
      <MicroApp name="app2" base={window.originalBaseName || '/demo'} />
    </div>
  );
}
