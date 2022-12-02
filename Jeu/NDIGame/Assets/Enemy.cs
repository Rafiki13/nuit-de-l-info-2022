using UnityEngine;

namespace NDIGame
{
    public class Enemy : MonoBehaviour
    {
        [SerializeField] private int life = 10;
        [SerializeField] private int speed = 3;
        [SerializeField] private int defense = 2;
        [SerializeField] private int magicDefense = 2;
        [SerializeField] private int damage = 2;

        private float epsilon = 0.1f;

        private Waypoint start;
        private Waypoint target;

        private float distanceBetweenWaypoints;
        private float distanceRestante;

        private int hp;

        void Start()
        {
            start = GameManager.Instance.SpawnPoint;
            transform.position = start.transform.position;
            target = start.RandomNext;
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
            hp -= damages;
            Debug.Log("Enemy being damaged");
            if(hp <= 0)
            {
                Destroy(gameObject);
                Debug.Log("Enemy destroyed");
            }

        }

        private void OnTriggerEnter2D(Collider2D other)
        {
            Debug.Log("Detected TriggerEnter event");
        }

        private void OnTriggerStay2D(Collider2D other)
        {
            Debug.Log("Detected TriggerStay event");
            Tower tower = other.GetComponent<Tower>();
            if(tower)
            {
                tower.FocusEnemy(this);
            }
        }
    }
}

