import mockjs from 'mockjs';

export default {
  'GET /mo/api/users': mockjs.mock({
    'data|100': [
      {
        'id|+1': 1,
        name: '@name',
        email: '@email',
      },
    ],
  }),
};
