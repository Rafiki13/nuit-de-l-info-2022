using UnityEngine;

namespace NDIGame
{
    public class Enemy : MonoBehaviour
    {
        [SerializeField] private int life = 10;
        [SerializeField] private float speed = 3f;
        [SerializeField] private float defense = 2;
        [SerializeField] private float magicDefense = 2;
        [SerializeField] private int damage = 2;
        [SerializeField] private int money = 0;

        private float epsilon = 0.1f;

        private Waypoint start;
        private Waypoint target;

        private float distanceBetweenWaypoints;
        private float distanceRestante;

        void Start()
        {
            start = GameManager.Instance.SpawnPoint;
            transform.position = start.transform.position;
            target = start.RandomNext;
            GameManager.Instance.AddEnemy(this);
        }

        void Update()
        {
            if (target == null)
            {
                GameManager.Instance.Damage(damage);
                Destroy(gameObject);
            }
            else
            {
                distanceBetweenWaypoints = Vector2.Distance(start.transform.position, target.transform.position);
                distanceRestante = Vector2.Distance(transform.position, target.transform.position);

                Vector2 endPoint = (Vector2)target.transform.position;
                transform.position = Vector2.MoveTowards(transform.position, endPoint, speed * Time.deltaTime);

                if (distanceRestante < epsilon)
                {
                    start = target;
                    target = start.RandomNext;
                }

            }

        }

        public void Damage(int damages)
        {
            life -= damages;
            if(life <= 0)
            {
                GameManager.Instance.AddMoney(money);
                Destroy(gameObject);
            }

        }

        private void OnDestroy()
        {
            GameManager.Instance.RemoveEnemy(this);
        }

    }

}

